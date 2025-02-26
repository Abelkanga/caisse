<?php

namespace App\Controller;

use App\Entity\BonCaisse;
use App\Entity\BonMission;
use App\Entity\JournalCaisse;
use App\Entity\Fdb;
use App\Entity\Notification;
use App\Entity\OrderMission;
use App\Entity\User;
use App\Form\BonMissionType;
use App\Form\OrderMissionType;
use App\Repository\BonMissionRepository;
use App\Repository\JournalCaisseRepository;
use App\Repository\JourneeRepository;
use App\Service\CaisseService;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Pusher\Pusher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class BonMissionController extends AbstractController
{
    #[Route('/bon-mission', name: 'bon_mission_index', methods:['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $bonMission = $entityManager->getRepository(BonMission::class)->findAll();

        return $this->render('bon_mission/index.html.twig', [
            'bonMission' => $bonMission,
        ]);
    }

    #[Route('/bon-mission/responsable', name: 'bon_mission_responsable', methods: ['GET'])]
    public function responsable(BonMissionRepository $bonMissionRepository): Response
    {
        // Récupérer les bons de mission créés par des responsables
        $bonMission = $bonMissionRepository->findByResponsable();

        return $this->render('bon_mission/index.html.twig', [
            'bonMission' => $bonMission,
        ]);
    }

    #[Route('/bon-mission-convertis', name: 'bon_mission_converted', methods: ['GET'])]
    public function converted(EntityManagerInterface $entityManager): Response
    {
        $bonMission = $entityManager->getRepository(BonMission::class)->findConverted();

        return $this->render('bon_mission/index.html.twig', [
            'bonMission' => $bonMission,
        ]);
    }


    #[Route('/{id}/envoyer', name: 'bon_mission_envoyer', methods: ['POST'])]
    public function envoyer(
        Request $request,
        BonMission $bonMission,
        Pusher                 $pusher,
        UrlGeneratorInterface  $generatorUrl,
        EntityManagerInterface $entityManager
    ): Response {
        // Vérification manuelle de l'utilisateur ou de ses permissions
        $user = $this->getUser();

        $link = $generatorUrl->generate('bon_mission_show', ['id' => $bonMission->getId()]);

        // Exemple : vérifier si l'utilisateur est lié à la mission ou possède un rôle spécifique
        if ($user === $bonMission->getUser() || in_array('ROLE_RESPONSABLE', $user->getRoles()) || in_array('ROLE_IMPRESSION', $user->getRoles())) {

           $manager1Notification = (new Notification())
               ->setUser($user)
               ->setStatus(Status::VALIDATED)
               ->setUnread(true)
               ->setPermission('ROLE_MANAGER1')
               ->setBonMission($bonMission)
               ->setLink($link)
               ->setMessage('Bon de mission en attente d\'approbation.');

            $entityManager->persist($manager1Notification);

            $pusher->trigger('notify', 'manager1', [
                'message' => 'Bon de mission en attente d\'approbation.',
                'permission' => 'ROLE_MANAGER1',
                'link' => $link,
            ]);



            // Changer le statut à VALIDÉ
            $bonMission->setStatus(Status::VALIDATED);

            // Validation du CSRF Token
            if (!$this->isCsrfTokenValid('envoyer' . $bonMission->getId(), $request->request->get('_token'))) {
                throw $this->createAccessDeniedException('Invalid CSRF token.');
            }

            $entityManager->flush();

            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->success('Bon de mission envoyé pour approbation.');
        } else {
            // L'utilisateur n'a pas les droits
            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->error('Vous n’avez pas les droits pour envoyer cet bon de mission.');
        }

        return $this->redirectToRoute('bon_mission_index', ['id' => $bonMission->getId()]);
    }

    #[Route('/{id}/process', name: 'bon_mission_process', methods: ['POST'])]
    #[IsGranted('ROLE_MANAGER1')]
    public function process(
        BonMission $bonMission,
        Pusher                 $pusher,
        UrlGeneratorInterface  $generatorUrl,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        // Récupérer l'action (approve ou cancel) depuis la requête
        $action = $request->request->get('action');

        $link = $generatorUrl->generate('bon_mission_show', ['id' => $bonMission->getId()]);

        if ($this->isGranted('ROLE_MANAGER1')) {
            if ($action === 'approve') {

                $notification = $entityManager->getRepository(Notification::class)->findOneBy([
                    'bonMission' => $bonMission,
                    'unread' => true,
                    'permission' => 'ROLE_MANAGER1'
                ]);

                if ($notification) {
                    $notification->setUnread(false);
                    $entityManager->persist($notification);
                }


                $managerNotifiaction = (new Notification())
                    ->setUser($this->getUser())
                    ->setStatus(Status::APPROUVED)
                    ->setUnread(true)
                    ->setPermission('ROLE_MANAGER')
                    ->setBonMission($bonMission)
                    ->setLink($generatorUrl->generate('bon_mission_show', ['id' => $bonMission->getId()]))
                    ->setMessage('Bon de mission envoyé pour décaissement.');

                $entityManager->persist($managerNotifiaction);

                $caisseId = $bonMission->getCaisse()->getId();
                $event = sprintf("caisse.%s", $caisseId);
                $pusher->trigger('notify', $event, [
                    'message' => 'Le bon en attente de décaissement.',
                    'permission' => 'ROLE_MANAGER',
                    'link' => $managerNotifiaction->getLink()
                ]);


                $bonMission->setStatus(Status::APPROUVED);

                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->success('Bon de mission envoyé pour décaissement.');
            }

            elseif ($action === 'cancel') {
                $bonMission->setStatus(Status::CANCELLED);

                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->error('Bon de mission annulé avec succès.');
            }

            $entityManager->flush();
        }

        return $this->redirectToRoute('bon_mission_show', ['id' => $bonMission->getId()]);
    }

//    #[Route('/{id}/edit', name: 'bon_mission_edit', methods: ['GET', 'POST'])]
//    public function edit(Request $request, BonMission $bonMission, EntityManagerInterface $entityManager) : Response
//    {
//
////        $form =$this->createForm(BonMissionType::class, $bonMission);
//
//        $form = $this->createForm(BonMissionType::class, $bonMission, [
//            'orderMission' => $bonMission->getOrderMission(), // Vérifie que ceci ne retourne pas null
//        ]);
//
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager->flush();
//
//            flash()
//                ->options([
//                    'timeout' => 5000, //3 seconds
//                    'position' => 'bottom-right',
//                ])
//                ->success('Bon de mission modifié avec succès !');
//
//            return $this->redirectToRoute('bon_mission_index');
//        }
//
//        return $this->render('bon_mission/edit.html.twig', [
//            'bonMission' => $bonMission,
//            'form' => $form->createView(),
//        ]);
//    }

    #[Route('/{id}/edit', name: 'bon_mission_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BonMission $bonMission, EntityManagerInterface $entityManager) : Response
    {
        $orderMission = $bonMission->getOrderMission();
        if (!$orderMission instanceof OrderMission) {
            throw new \RuntimeException('OrderMission is not an instance of OrderMission');
        }

        $form = $this->createForm(BonMissionType::class, $bonMission, [
            'orderMission' => $orderMission,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->flush();

            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->success('Bon de mission modifié avec succès !');

            return $this->redirectToRoute('bon_mission_index');
        }

        return $this->render('bon_mission/edit.html.twig', [
            'bonMission' => $bonMission,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/bon-mission/{id}', name: 'bon_mission_show', methods: ['GET', 'POST'])]
    public function show(
       BonMission  $bonMission,
        Request $request,
        EntityManagerInterface $entityManager,
        CaisseService $service,
        JournalCaisseRepository $jcRepository,
        JourneeRepository $journeeRepository
    ): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $total = 0;
        foreach ($bonMission->getDetailBonMission() as $detail) {
            $montant = $detail->getMontant();
            if ($montant) {
                $total += $montant;
            }
        }




        if ($this->isGranted('ROLE_MANAGER')) {
            $caisse = $user->getCaisse();

            if (!$caisse) {
                // L'utilisateur manager n'est pas lié à une caisse
                $this->addFlash('error', 'Vous n\'êtes pas associé à une caisse.');

                return $this->redirectToRoute('app_welcome');
            }

            // Récupérer la fiche de besoin associée
            $orderMission = $bonMission->getOrderMission();
            if (!$orderMission) {
                $this->addFlash('error', 'Aucune fiche de besoin associée.');
                return $this->redirectToRoute('app_welcome');
            }

            if ($request->request->has('confirm_order_manager')) {

                $total = $bonMission->getTotal();
                $solde = $caisse->getSoldedispo();

                if ($solde < $total) {

                    flash()
                        ->options([
                            'timeout' => 5000, // 3 seconds
                            'position' => 'bottom-right',
                        ])
                        ->error('Pas de fond disponible pour effectuer cette opération');

                    return $this->redirectToRoute('app_welcome');
                }

                $caisseCode = $caisse->getCode();

                $num_journalCaisse = $service->refJournalCaisse($caisseCode);

                $amount = $bonMission->getTotal();

                $lastSolde = $jcRepository->getLastSolde($caisse->getId());
                $journalCaisse = (new JournalCaisse())
                    ->setNumPiece($num_journalCaisse)
                    ->setDate(new \DateTime())
                    ->setCaisse($caisse)
                    ->setBonMission($bonMission)
                    ->setSortie($bonMission->getTotal())
                    ->setIntitule($orderMission->getFullName())
                    ->setSolde($lastSolde - $total)
                    ->setOrderMission($orderMission)
                ;


                $caisse->setSoldedispo($solde - $total);
//                $orderMission->setStatus(Status::CONVERT);
                $bonMission->setStatus(Status::CONVERT);


                $active = $journeeRepository->activeJournee();
                $active->setCredit($amount + $active->getCredit())->setSolde($active->getDebit() - $active->getCredit());

                // Persister les changements

                $entityManager->persist($caisse);
                $entityManager->persist($orderMission);
                $entityManager->persist($journalCaisse);
                $entityManager->persist($bonMission);
                $entityManager->persist($active);
                $entityManager->flush();

                
                flash()
                    ->options([
                        'timeout' => 5000, // 3 seconds
                        'position' => 'bottom-right',
                    ])
                    ->success('Bon de mission décaissé avec succès ! ');

//                return $this->redirectToRoute('bon_mission_show');
                return $this->redirectToRoute('bon_mission_show', ['id' => $bonMission->getId()]);
            }

        }

        return $this->render('bon_mission/show.html.twig', [
            'bonMission' => $bonMission,
            'total' => $total,
        ]);
    }

    #[Route('/bon-mission/{id}/print', name: 'bon_mission_print', methods: ['GET'])]
    public function print(BonMission $bonMission, OrderMission $orderMission) : Response {

        return $this->render('bon_mission/print.html.twig', [
            'bonMission' => $bonMission,
            'orderMission' => $orderMission

        ]);
    }



}
