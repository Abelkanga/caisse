<?php

namespace App\Controller;

use App\Entity\BonCaisse;
use App\Entity\Fdb;
use App\Entity\JournalCaisse;
use App\Entity\Notification;
use App\Entity\User;
use App\Form\BonCaisseType;
use App\Form\FdbType;
use App\Repository\CaisseRepository;
use App\Repository\FdbRepository;
use App\Repository\JournalCaisseRepository;
use App\Repository\JourneeRepository;
use App\Service\CaisseService;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Pusher\Pusher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Uid\Uuid;

class FicheController extends AbstractController
{
    #[Route('/fdb', name: 'fdb_index', methods: ['GET'])]
    public function index(FdbRepository $repository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $fdb = $repository->findByUserRole($user);  // Utilise la méthode filtrant les fiches actives uniquement

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb,
        ]);
    }


    #[Route('/fdb/pending', name: 'fdb_pending', methods: ['GET'])]
    public function pending(FdbRepository $fdbRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $fdb = $fdbRepository->findPendingByUserRole($user);

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }

    #[Route('/fdb/brouillon', name: 'fdb_brouillon', methods: ['GET'])]
    public function broullion(FdbRepository $fdbRepository): Response
    {
        $fdb = $fdbRepository->findFicheByStatus(Status::BROUILLON);

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }

    #[Route('/fdb/cancel', name: 'fdb_cancel', methods: ['GET'])]
    public function canceled(FdbRepository $fdbRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $fdb = $fdbRepository->findFdbCancelByUserRole($user);

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }

    #[Route('/fdb/approuve', name: 'fdb_approuve', methods: ['GET'])]
    public function approved(FdbRepository $fdbRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $fdb = $fdbRepository->findFdbApprouveByUserRole($user);

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }


    #[Route('/fdb/approuved', name: 'fdb_approuved', methods: ['GET'])]
    public function approvedUserCash(FdbRepository $fdbRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        // Récupérer les fiches de besoin approuvées en fonction du rôle de l'utilisateur et de la caisse
        $fdb = $fdbRepository->findFdbApprouvedByUserRoleAndCaisse($user);

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }

    #[Route('/fdb/validate', name: 'fdb_validate', methods: ['GET'])]
    public function validate(FdbRepository $fdbRepository): Response
    {
        $fdb = $fdbRepository->findFicheByStatus(Status::VALIDATED);

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }


    #[Route('/fdb/new', name: 'fdb_new', methods: ['GET', 'POST'])]
    public function new(
        Request                $request,
        EntityManagerInterface $entityManager,
        CaisseRepository       $caisseRepository,
        CaisseService          $service
    ): Response
    {
        $refFiche = $service->refFdb();

        $fdb = (new Fdb())
            ->setDate(new \DateTime())
            ->setNumeroFicheBesoin($refFiche)
            ->setDestinataire('Konan Gwladys');
        $caisseSecondaire = $caisseRepository->findOneBy(['code' => 'C002']);
        $fdb->setCaisse($caisseSecondaire);

        $form = $this->createForm(FdbType::class, $fdb);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $status = $this->isGranted('ROLE_RESPONSABLE') ? Status::EN_ATTENTE : Status::BROUILLON;

            $fdb->setUser($user)->setStatus($status);
            foreach ($fdb->getDetails() as $detail) {
                $detail->setFdb($fdb);
                $entityManager->persist($detail);
            }

            // Persister la fiche de besoin avec la caisse secondaire
            $entityManager->persist($fdb);
            $entityManager->flush();

            flash()
                ->options(['timeout' => 5000, 'position' => 'bottom-right'])
                ->success('Fiche de besoin enregistrée avec succès !');

            return $this->redirectToRoute('fdb_index');
        }

        return $this->render('fdb/new.html.twig', [
            'fdb' => $fdb,
            'form' => $form->createView(),
        ]);

    }

    #[Route('/fdb/{id}/edit', name: 'fdb_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fdb $fdb, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FdbType::class, $fdb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Fiche de besoin modifiée avec succès !');


            return $this->redirectToRoute('fdb_index');
        }

        return $this->render('fdb/edit.html.twig', [
            'fdb' => $fdb,
            'form' => $form->createView(),
        ]);
    }

    #[Route("/fdb/{id}/show", name: 'fdb_show', methods: ['GET', 'POST'])]
    public function show(
        Fdb                    $fdb,
        EntityManagerInterface $entityManager,
        Pusher                 $pusher,
        UrlGeneratorInterface  $generatorUrl,
        Request                $request
    ): Response
    {
        $total = 0;
        foreach ($fdb->getDetails() as $detail) {
            $montant = $detail->getMontant();
            if ($montant) {
                $total += $montant;
            }
        }


        // send notification
        if ($request->isMethod('POST') && $this->isCsrfTokenValid('validate-caisse-fdb', $request->request->get('_token'))) {
            $link = $generatorUrl->generate('fdb_show', ['id' => $fdb->getId()]);
            if ($request->request->has('send_fdb')) {
                $responsableId = $fdb->getValidBy()->getId();
                $notification = (new Notification());
                $entityManager->persist($notification);
                $channel = 'responsable' . $responsableId;
                $pusher->trigger($channel, 'notification', [
                    'responsableId' => $responsableId,
                    'message' => 'Fiche de besoin en attente de validation'
                ]);
                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->success('Fiche de besoin envoyé pour la validation');
                $fdb->setStatus(Status::EN_ATTENTE);
                $entityManager->flush();
                return $this->redirectToRoute('fdb_index');
            }


            // validation fiche besoin
            if ($this->isGranted('ROLE_RESPONSABLE') && $request->request->has('confirm_responsable')) {
                $notification = (new Notification())
                    ->setFdb($fdb)
                    ->setMessage('Fiche de besoin en attente d\'approbation')
                    ->setLink($link);
                $entityManager->persist($notification);
                $pusher->trigger('responsable', 'notification', [
                    'message' => 'Fiche de besoin en attente d\'approbation'
                ]);
                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->success('Fiche de besoin validée');

                $fdb->setStatus(Status::VALIDATED);
                $entityManager->flush();

                return $this->redirectToRoute('fdb_index');
            }
            // Cancel Fiche besoin

            if ($request->request->has('cancel_responsable') && $this->isGranted('ROLE_RESPONSABLE')) {
                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->success('Fiche de besoin annulée');
                $fdb->setStatus(Status::CANCELLED);
                $entityManager->flush();
                return $this->redirectToRoute('fdb_index');
            }

            //Approvouver fiche besoin
            if ($request->request->has('confirm_manager1') && $this->isGranted('ROLE_MANAGER1')) {
                $caisse = $fdb->getCaisse();
                $cashUserId = $caisse->getUser()->getId();
                $fdb->setStatus(Status::APPROUVED);
                $entityManager->persist($fdb);
                $entityManager->flush();
                $notification = (new Notification())
                    ->setFdb($fdb)
                    ->setMessage('Fiche de besoin approuvée')
                    ->setLink($link);
                $entityManager->persist($notification);
                $pusher->trigger('user.' . $cashUserId, 'notification', [
                    'message' => 'Fiche de besoin approuvée'
                ]);
                return $this->redirectToRoute('app_welcome');
            }
        }

        return $this->render('fdb/show.html.twig', [
            'fdb' => $fdb,
            'total' => $total,
            'operation_type' => 'decaissement', // ajout de cette variable
        ]);

    }

    #[Route('/fdb/{uuid}/print', name: 'print_fdb', methods: ['GET'])]
    public function print(Fdb $fdb): Response
    {
        return $this->render('fdb/print.html.twig', [
            'fdb' => $fdb
        ]);
    }

    #[Route('/fdb/{uuid}/printA', name: 'printA_fdb', methods: ['GET'])]
    public function printA(Fdb $fdb): Response
    {
        return $this->render('fdb/printA.html.twig', [
            'fdb' => $fdb
        ]);
    }

    #[Route('/fdb/{id}/delete', name: 'fdb_delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $manager, Fdb $fdb): Response
    {
        $user = $this->getUser();
        $roles = $user->getRoles();

        // Vérifier que l'utilisateur a l'un des rôles nécessaires, que la fiche lui appartient, et qu'elle est annulée et active
        if ((in_array('ROLE_USER', $roles) || in_array('ROLE_RESPONSABLE', $roles) || in_array('ROLE_IMPRESSION', $roles))
            && $fdb->getUser() === $user
            && $fdb->getStatus() === Status::CANCELLED
            && $fdb->getIsActive()) {

            // Mettre à jour la propriété isActive à false pour désactiver la fiche
            $fdb->setIsActive(false);
            $manager->flush();

            flash()->options(['timeout' => 5000, 'position' => 'bottom-right'])->success('Fiche de besoin supprimée avec succès !');
        } else {
            // Si les conditions ne sont pas respectées, afficher un message d'erreur
            flash()->options(['timeout' => 5000, 'position' => 'bottom-right'])->error('Vous ne pouvez supprimer que vos propres fiches annulées.');
        }

        return $this->redirectToRoute('fdb_index');
    }

    #[Route('/fdb/{uuid}/convert', name: 'fdb_convert', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_MANAGER')]
    public function convert(
        Fdb                     $fdb,
        Request                 $request,
        EntityManagerInterface  $entityManager,
        JourneeRepository       $journeeRepository,
        JournalCaisseRepository $jcRepository,
        CaisseService           $service
    ): Response
    {
        // Récupération de la caisse liée au manager
        /** @var User $user */
        $user = $this->getUser();
        $caisse = $user->getCaisse();

        if (!$caisse) {
            $this->addFlash('error', 'Vous n\'êtes pas associé à une caisse.');
            return $this->redirectToRoute('fdb_show', ['uuid' => $fdb->getUuid()]);
        }

        // Générer la référence du bon de caisse
        $num_bon = $service->refBonCaisse();

        // Création du bon de caisse
        $bonCaisse = (new BonCaisse())
            ->setReference($num_bon)
            ->setDate(new \DateTime())
            ->setStatus(Status::EN_ATTENTE)
            ->setBeneficiaire($fdb->getBeneficiaire())
            ->setFdb($fdb)
            ->setFdb($fdb->setStatus(Status::APPROUVED))
            ->setMontant($fdb->getTotal())
            ->setCaisse($caisse);

        // L'UUID est généré automatiquement dans le constructeur ou ici manuellement si nécessaire
        if (!$bonCaisse->getUuid()) {
            $bonCaisse->setUuid(Uuid::v4());
        }

        // Création du formulaire avant la condition
        $form = $this->createForm(BonCaisseType::class, $bonCaisse, [
            'fdb' => $fdb,
        ]);

        $form->handleRequest($request);

        // Si la requête contient 'confirm_manager'
        if ($request->request->has('confirm_manager')) {
            $solde = $caisse->getSoldedispo();
            $total = $fdb->getTotal();

            if ($solde < $total) {
                flash()
                    ->options([
                        'timeout' => 5000, // 3 seconds
                        'position' => 'bottom-right',
                    ])
                    ->error('Pas de fond disponible pour effectuer cette opération');

                return $this->redirectToRoute('app_welcome');
            }


            $amount = $fdb->getTotal();

            $caisseCode = $caisse->getCode();

            $numJournalCaisse = $service->refJournalCaisse($caisseCode);

            $lastSolde = $jcRepository->getLastSolde($caisse->getId());

            $journalCaisse = (new JournalCaisse())
                ->setNumPiece($numJournalCaisse)
                ->setDate(new \DateTime())
                ->setCaisse($caisse)
                ->setBonCaisse($bonCaisse)
                ->setSortie($fdb->getTotal())
                ->setIntitule($fdb->getTypeExpense())
                ->setSolde($lastSolde - $total)
                ->setFdb($fdb);

            $caisse->setSoldedispo($solde - $total);
            $fdb->setStatus(Status::CONVERT);
            $bonCaisse->setStatus(Status::CONVERT);

            $active = $journeeRepository->activeJournee();
            $active->setCredit($amount + $active->getCredit())
                ->setSolde($active->getDebit() - $active->getCredit());

            // Ajout des entités à persister
            $entityManager->persist($bonCaisse);
            $entityManager->persist($caisse);
            $entityManager->persist($journalCaisse);
            $entityManager->persist($active);
            $entityManager->persist($fdb);

            $entityManager->flush();

            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Bon de caisse décaissé avec succès.');

            return $this->redirectToRoute('fdb_show', [
                'id' => $fdb->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        // Affichage du formulaire sur la vue show de la fiche de besoin
        return $this->render('bon_caisse/new.html.twig', [
            'form' => $form->createView(),
            'fdb' => $fdb,
            'bonCaisse' => $bonCaisse,
            'operation_type' => 'decaissement',
        ]);
    }

}
