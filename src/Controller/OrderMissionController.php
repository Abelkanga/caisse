<?php
//
//namespace App\Controller;
//
//use App\Entity\BonMission;
//use App\Entity\OrderMission;
//use App\Entity\User;
//use App\Form\BonMissionType;
//use App\Form\OrderMissionType;
//use App\Repository\CaisseRepository;
//use App\Repository\JournalCaisseRepository;
//use App\Repository\JourneeRepository;
//use App\Repository\OrderMissionRepository;
//use App\Service\CaisseService;
//use App\Utils\Status;
//use Doctrine\ORM\EntityManagerInterface;
//use Mpdf\Tag\S;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Attribute\Route;
//use Symfony\Component\Uid\Uuid;
//
//#[Route('/order/mission')]
//class OrderMissionController extends AbstractController
//{
//    #[Route('/', name: 'app_order_mission_index', methods: ['GET'])]
//    public function index(OrderMissionRepository $orderMissionRepository): Response
//    {
//        /** @var User $user */
//        $user = $this->getUser();
//        $orderMission = $orderMissionRepository->findByUserRole($user);
//
//        return $this->render('order_mission/index.html.twig', [
//            'order_missions' => $orderMission,
//        ]);
//    }
//
//    #[Route('/pending', name: 'app_order_mission_pending', methods: ['GET'])]
//    public function pending(OrderMissionRepository $orderMissionRepository): Response
//    {
//        /** @var User $user */
//        $user = $this->getUser();
//        $orderMission = $orderMissionRepository->findPendingByUserRole($user);
//
//        return $this->render('order_mission/index.html.twig', [
//            'order_missions' => $orderMission
//        ]);
//    }
//
//
//    #[Route('/brouillon', name: 'app_order_mission_brouillon', methods: ['GET'])]
//    public function broullion(OrderMissionRepository $orderMissionRepository): Response
//    {
//        $orderMission = $orderMissionRepository->findFicheByStatus(Status::BROUILLON);
//
//        return $this->render('order_mission/index.html.twig', [
//            'order_missions' => $orderMission
//        ]);
//    }
//
//
//    #[Route('/cancel', name: 'app_order_mission_cancel', methods: ['GET'])]
//    public function canceled(OrderMissionRepository $orderMissionRepository): Response
//    {
//        /** @var User $user */
//        $user = $this->getUser();
//        $orderMission = $orderMissionRepository->findFdbCancelByUserRole($user);
//
//        return $this->render('order_mission/index.html.twig', [
//            'order_missions' => $orderMission
//        ]);
//    }
//
//
//    #[Route('/approuve', name: 'app_order_mission_approuve', methods: ['GET'])]
//    public function approved(OrderMissionRepository $orderMissionRepository): Response
//    {
//        /** @var User $user */
//        $user = $this->getUser();
//        $orderMission = $orderMissionRepository->findFdbApprouveByUserRole($user);
//
//        return $this->render('order_mission/index.html.twig', [
//            'order_missions' => $orderMission
//        ]);
//    }
//
//
//    #[Route('/approuved', name: 'app_order_mission_approuved', methods: ['GET'])]
//    public function approvedUserCash(OrderMissionRepository $orderMissionRepository): Response
//    {
//        /** @var User $user */
//        $user = $this->getUser();
//
//        // Récupérer les fiches de besoin approuvées en fonction du rôle de l'utilisateur et de la caisse
//        $orderMission = $orderMissionRepository->findFdbApprouvedByUserRoleAndCaisse($user);
//
//        return $this->render('order_mission/index.html.twig', [
//            'order_missions' => $orderMission
//        ]);
//    }
//
//
//    #[Route('/validate', name: 'app_order_mission_validate', methods: ['GET'])]
//    public function validate(OrderMissionRepository $orderMissionRepository): Response
//    {
//        $orderMission = $orderMissionRepository->findFicheByStatus(Status::VALIDATED);
//
//        return $this->render('order_mission/index.html.twig', [
//            'order_missions' => $orderMission
//        ]);
//    }
//
//    #[Route('/validated-by-user', name: 'app_order_mission_validated_by_user', methods: ['GET'])]
//    public function validatedByUser(OrderMissionRepository $orderMissionRepository): Response
//    {
//        $orderMission = $orderMissionRepository->findValidatedByRoleUser();
//
//        return $this->render('order_mission/index.html.twig', [
//            'order_missions' => $orderMission
//        ]);
//    }
//
//
////    #[Route('/new', name: 'app_order_mission_new', methods: ['GET', 'POST'])]
//    public function new(Request $request,
//                        EntityManagerInterface $entityManager,
//                        CaisseService          $service,
//                        CaisseRepository       $caisseRepository): Response
//    {
//
//        /** @var User $user */
//        $user = $this->getUser();
//        $beneficiaire = $user->getFullName() . ' ' . $user->getPrenom(); // Concaténation prénom + nom
//
//        $refOrder = $service->refOrder();
//
//        $orderMission = new OrderMission();
//        $orderMission->setGerant('OFFSET CONSULTING')
//            ->setDate(new \DateTime())
//            ->setOrderTo($beneficiaire)
//            ->setFonction('638 - Autres charges externes')
//            ->setService('638400 -  Missions')
//            ->setReference($refOrder);
//
//        // Récupérer la caisse secondaire (ou principale selon votre logique)
//        $caisseSecondaire = $caisseRepository->findOneBy(['code' => 'C002']);
//        $orderMission->setCaisse($caisseSecondaire);
//
//
//        $form = $this->createForm(OrderMissionType::class, $orderMission);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            /** @var User $user */
//            $user = $this->getUser();
//
//            if ($this->isGranted('ROLE_MANAGER')) {
//                // Pour ROLE_MANAGER, statut par défaut = BROUILLON
//                $status = Status::BROUILLON;
//
//                // Si l'utilisateur clique sur "Envoyer", passer à VALIDATED
//                if ($request->request->has('send_order')) {
//                    $status = Status::VALIDATED;
//                }
//
//                $orderMission->setStatus($status);
//            } else if ($this->isGranted('ROLE_IMPRESSION')) {
//                // Logique pour ROLE_IMPRESSION similaire à ROLE_MANAGER
//                $status = Status::BROUILLON;
//
//                if ($request->request->has('send_order')) {
//                    $status = Status::VALIDATED;
//                }
//
//                $orderMission->setStatus($status);
//            } else {
//                // Logique par défaut pour les autres rôles
//                $status = $this->isGranted('ROLE_RESPONSABLE') ? Status::EN_ATTENTE : Status::BROUILLON;
//                $orderMission->setStatus($status);
//            }
//
//
//            $orderMission->setUser($user);
//            foreach ($orderMission->getDetailMission() as $detailMission) {
//                $detailMission->setOrderMission($orderMission);
//                $entityManager->persist($detailMission);
//            }
//
//            $entityManager->persist($orderMission);
//            $entityManager->flush();
//
//            flash()
//                ->options(['timeout' => 5000, 'position' => 'bottom-right'])
//                ->success('Ordre de mission enregistré avec succès !');
//
//            return $this->redirectToRoute('app_order_mission_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->render('order_mission/new.html.twig', [
//            'order_mission' => $orderMission,
//            'form' => $form,
//        ]);
//    }
//
////    #[Route('/{id}', name: 'app_order_mission_show', methods: ['GET'])]
//    public function show(OrderMission $orderMission,  EntityManagerInterface $entityManager, Request                $request,): Response
//    {
//
//        if ($request->isMethod('POST') && $this->isCsrfTokenValid('validate-ordre-mission', $request->request->get('_token'))) {
//
//            // Vérification du bouton "Envoyer"
//            if ($request->request->has('send_order')) {
//
//
//
//                // Cas spécifique pour ROLE_MANAGER et ROLE_IMPRESSION
//                if ($this->isGranted('ROLE_MANAGER') || $this->isGranted('ROLE_IMPRESSION')) {
//
//                    // Mise à jour du statut de la Fdb à VALIDATED pour ROLE_MANAGER et ROLE_IMPRESSION
//                    $orderMission->setStatus(Status::VALIDATED);
//
//                    flash()
//                        ->options([
//                            'timeout' => 5000,
//                            'position' => 'bottom-right',
//                        ])
//                        ->success('Fiche de besoin envoyée pour approbation.');
//                } else {
//
//                    // Mise à jour du statut de la Fdb à EN_ATTENTE
//                    $orderMission->setStatus(Status::EN_ATTENTE);
//
//                    flash()
//                        ->options([
//                            'timeout' => 5000,
//                            'position' => 'bottom-right',
//                        ])
//                        ->success('Fiche de besoin envoyée pour validation.');
//                }
//
//                // Enregistrement en base
//                $entityManager->flush();
//
//                // Redirection
//                return $this->redirectToRoute('app_order_mission_index');
//            }
//
//
////            if ($this->isGranted('ROLE_RESPONSABLE') && $request->request->has('confirm_order_responsable')) {
////
////                flash()
////                    ->options([
////                        'timeout' => 5000,
////                        'position' => 'bottom-right',
////                    ])
////                    ->success('Ordre de mission envoyé pour approbation.');
////
////                $orderMission->setStatus(Status::VALIDATED);
////                $entityManager->flush();
////
////                return $this->redirectToRoute('app_order_mission_index');
////            }
//
//
//            // Validation par ROLE_RESPONSABLE
//            if ($this->isGranted('ROLE_RESPONSABLE') && $request->request->has('confirm_order_responsable')) {
//
//
//                flash()
//                    ->options([
//                        'timeout' => 5000,
//                        'position' => 'bottom-right',
//                    ])
//                    ->success('Fiche de besoin envoyée pour approbation.');
//
//                $orderMission->setStatus(Status::VALIDATED);
//                $entityManager->flush();
//
//                return $this->redirectToRoute('app_order_mission_index');
//            }
//
////            if ($request->request->has('cancel_order_responsable') && $this->isGranted('ROLE_RESPONSABLE')) {
////
////
////                flash()
////                    ->options([
////                        'timeout' => 5000,
////                        'position' => 'bottom-right',
////                    ])
////                    ->success('Ordre de mission annulé.');
////
////                $orderMission->setStatus(Status::CANCELLED);
////                $entityManager->flush();
////
////                return $this->redirectToRoute('app_order_mission_index');
////            }
//
//
//
//            // Annulation par ROLE_RESPONSABLE
//            if ($request->request->has('cancel_order_responsable') && $this->isGranted('ROLE_RESPONSABLE')) {
//
//
//                flash()
//                    ->options([
//                        'timeout' => 5000,
//                        'position' => 'bottom-right',
//                    ])
//                    ->success('Fiche de besoin annulée.');
//
//                $orderMission->setStatus(Status::CANCELLED);
//                $entityManager->flush();
//
//                return $this->redirectToRoute('app_order_mission_index');
//            }
//
//            // Approuver par ROLE_MANAGER1
////            if ($request->request->has('confirm_order_manager1') && $this->isGranted('ROLE_RESPONSABLE')) {
////
////                flash()
////                    ->options([
////                        'timeout' => 5000,
////                        'position' => 'bottom-right',
////                    ])
////                    ->success('Ordre de mission envoyé pour décaissement.');
////
////                $orderMission->setStatus(Status::APPROUVED);
////                $entityManager->flush();
////                return $this->redirectToRoute('app_order_mission_index');
////            }
////
////
////            if ($request->request->has('cancel_order_manager1') && $this->isGranted('ROLE_MANAGER1')) {
////
////                // Mise à jour du statut de la fiche de besoin
////                flash()
////                    ->options([
////                        'timeout' => 5000,
////                        'position' => 'bottom-right',
////                    ])
////                    ->success('Ordre de mission annulé par le manager.');
////
////                $orderMission->setStatus(Status::CANCELLED);
////                $entityManager->flush();
////                return $this->redirectToRoute('app_order_mission_index');
////            }
//
//            if ($request->request->has('confirm_order_manager1') && $this->isGranted('ROLE_MANAGER1')) {
//
//
//                flash()
//                    ->options([
//                        'timeout' => 5000,
//                        'position' => 'bottom-right',
//                    ])
//                    ->success('Fiche de besoin envoyée pour décaissement.');
//
//                $orderMission->setStatus(Status::APPROUVED);
//                $entityManager->flush();
//
//                return $this->redirectToRoute('app_order_mission_index');
//            }
//
//            if ($request->request->has('cancel_order_manager1') && $this->isGranted('ROLE_MANAGER1')) {
//
//                // Mise à jour du statut de la fiche de besoin
//                flash()
//                    ->options([
//                        'timeout' => 5000,
//                        'position' => 'bottom-right',
//                    ])
//                    ->success('Fiche de besoin annulée par le manager.');
//
//                $orderMission->setStatus(Status::CANCELLED);
//                $entityManager->flush();
//
//                return $this->redirectToRoute('app_order_mission_index');
//            }
//
//        }
//
//
//        return $this->render('order_mission/show.html.twig', [
//            'order_mission' => $orderMission,
//        ]);
//    }
//
//    #[Route('/{id}/edit', name: 'app_order_mission_edit', methods: ['GET', 'POST'])]
//    public function edit(Request $request, OrderMission $orderMission, EntityManagerInterface $entityManager): Response
//    {
//        $form = $this->createForm(OrderMissionType::class, $orderMission);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager->flush();
//
//            flash()
//                ->options([
//                    'timeout' => 5000, // 3 seconds
//                    'position' => 'bottom-right',
//                ])
//                ->success('Ordre de mission modifié avec succès !');
//
//
//            return $this->redirectToRoute('app_order_mission_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->render('order_mission/edit.html.twig', [
//            'order_mission' => $orderMission,
//            'form' => $form,
//        ]);
//    }
//
//    #[Route('/{id}/convert', name: 'app_order_mission_convert', methods: ['GET', 'POST'])]
//    public function convert(
//        OrderMission            $orderMission,
//        Request                 $request,
//        EntityManagerInterface  $entityManager,
//        JourneeRepository       $journeeRepository,
//        JournalCaisseRepository $jcRepository,
//        CaisseService           $service
//    ): Response
//    {
//        // Récupération de la caisse liée au manager
//        /** @var User $user */
//        $user = $this->getUser();
//        $caisse = $user->getCaisse();
//
//        if (!$caisse) {
//            $this->addFlash('error', 'Vous n\'êtes pas associé à une caisse.');
//            return $this->redirectToRoute('app_order_mission_show', ['id' => $orderMission->getId()]);
//        }
//
//        $num_bonMission = $service->refBonMission();
//
//        $bonMission = (new BonMission())
//            ->setReference($num_bonMission)
//            ->setDate(new \DateTime())
//            ->setStatus(Status::EN_ATTENTE)
//            ->setBeneficiaire($orderMission->getBeneficiaire())
//            ->setOrderMission($orderMission)
//            ->setMontant($orderMission->getGetTo()) //champ montant sert de variable pour stocker entité
//            ->setOrderMission($orderMission->setStatus(Status::APPROUVED))
//            ->setCaisse($caisse);
//
//
//        // Création du formulaire avant la condition
//        $form = $this->createForm(BonMissionType::class, $bonMission, [
//            'orderMission' => $orderMission,
//        ]);
//
//        $form->handleRequest($request);
//
//        return $this->render('bon_mission/new.html.twig', [
//            'form' => $form->createView(),
//            'orderMission' => $orderMission,
//            'bonMission' => $bonMission,
//
//        ]);
//    }
//
//
//
//    #[Route('/{id}', name: 'app_order_mission_delete', methods: ['POST'])]
//    public function delete(Request $request, OrderMission $orderMission, EntityManagerInterface $entityManager): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$orderMission->getId(), $request->getPayload()->get('_token'))) {
//            $entityManager->remove($orderMission);
//            $entityManager->flush();
//        }
//
//        return $this->redirectToRoute('app_order_mission_index', [], Response::HTTP_SEE_OTHER);
//    }
//}


namespace App\Controller;

use App\Entity\BonMission;
use App\Entity\OrderMission;
use App\Entity\User;
use App\Form\BonMissionType;
use App\Form\OrderMissionType;
use App\Repository\CaisseRepository;
use App\Repository\JournalCaisseRepository;
use App\Repository\JourneeRepository;
use App\Repository\OrderMissionRepository;
use App\Service\CaisseService;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use FontLib\Table\Type\name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


#[Route('/order/mission')]
class OrderMissionController extends AbstractController
{

    #[Route('/', name: 'app_order_mission_index', methods: ['GET'])]
    public function index(
        EntityManagerInterface $entityManager
    ): Response
    {
        $orderMission = $entityManager->getRepository(OrderMission::class)->findAll();

        return $this->render('order_mission/index.html.twig', [
            'order_missions' => $orderMission,
        ]);

    }

    #[Route('/', name: 'app_order_mission_index_active', methods: ['GET'])]
    public function indexActive(OrderMissionRepository $orderMissionRepository): Response
    {
        $activeOrders = $orderMissionRepository->findAllActive();

        return $this->render('order_mission/index.html.twig', [
            'order_missions' => $activeOrders,
        ]);
    }



//    #[Route('/new', name: 'app_order_mission_new', methods: ['GET', 'POST'])]
//    public function new(Request                $request,
//                        EntityManagerInterface $entityManager,
//                        CaisseService          $service,
//                        CaisseRepository       $caisseRepository): Response
//    {
//
//        /** @var User $user */
//        $user = $this->getUser();
//        $beneficiaire = $user->getFullName() . ' ' . $user->getPrenom(); // Concaténation prénom + nom
//
//        $refOrder = $service->refOrder();
//
//        $orderMission = new OrderMission();
//        $orderMission->setGerant('OFFSET CONSULTING')
//            ->setDate(new \DateTime())
//            ->setOrderTo($beneficiaire)
//            ->setFonction('638 - Autres charges externes')
//            ->setService('638400 -  Missions')
//            ->setReference($refOrder);
//
//        // Récupérer la caisse secondaire (ou principale selon votre logique)
//        $caisseSecondaire = $caisseRepository->findOneBy(['code' => 'C002']);
//        $orderMission->setCaisse($caisseSecondaire);
//
//
//        $form = $this->createForm(OrderMissionType::class, $orderMission);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            /** @var User $user */
//            $user = $this->getUser();
//            // Déterminer le statut en fonction du rôle de l'utilisateur
//            if ($this->isGranted('ROLE_USER')) {
//                $orderMission->setStatus(Status::EN_ATTENTE);
//            } elseif ($this->isGranted('ROLE_RESPONSABLE') || $this->isGranted('ROLE_MANAGER')) {
//                $orderMission->setStatus(Status::VALIDATED);
//            }
//
//
//            $orderMission->setUser($user);
//            foreach ($orderMission->getDetailMission() as $detailMission) {
//                $detailMission->setOrderMission($orderMission);
//                $entityManager->persist($detailMission);
//            }
//
//            flash()
//                ->options([
//                    'timeout' => 5000,
//                    'position' => 'bottom-right',
//                ])
//                ->success('Ordre de mission créé avec succès.');
//
//            $entityManager->persist($orderMission);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('app_order_mission_index');
//        }
//
//        return $this->render('order_mission/new.html.twig', [
//            'orderMission' => $orderMission,
//            'form' => $form->createView(),
//        ]);
//    }

    #[Route('/new', name: 'app_order_mission_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        CaisseService $service,
        CaisseRepository $caisseRepository
    ): Response {
        /** @var User $user */
        $user = $this->getUser();
        $beneficiaire = $user->getFullName() . ' ' . $user->getPrenom(); // Concaténation prénom + nom

        $refOrder = $service->refOrder();

        $orderMission = new OrderMission();
        $orderMission->setGerant('OFFSET CONSULTING')
            ->setDate(new \DateTime())
            ->setOrderTo($beneficiaire)
            ->setFonction('638 - Autres charges externes')
            ->setService('638400 - Missions')
            ->setReference($refOrder);

        // Récupérer la caisse secondaire (ou principale selon votre logique)
        $caisseSecondaire = $caisseRepository->findOneBy(['code' => 'C001']);
        $orderMission->setCaisse($caisseSecondaire);

        $form = $this->createForm(OrderMissionType::class, $orderMission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();

            // Définit le statut initial à BROUILLON pour tous les rôles
            $orderMission->setStatus(Status::BROUILLON);

            $orderMission->setUser($user);
            foreach ($orderMission->getDetailMission() as $detailMission) {
                $detailMission->setOrderMission($orderMission);
                $entityManager->persist($detailMission);
            }

            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->success('Ordre de mission créé avec succès.');

            $entityManager->persist($orderMission);
            $entityManager->flush();

            return $this->redirectToRoute('app_order_mission_index');
        }

        return $this->render('order_mission/new.html.twig', [
            'orderMission' => $orderMission,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/envoyer', name: 'app_order_mission_envoyer', methods: ['POST'])]
    public function envoyer(
        Request $request,
        OrderMission $orderMission,
        EntityManagerInterface $entityManager
    ): Response {
        // Vérification manuelle de l'utilisateur ou de ses permissions
        $user = $this->getUser();

        // Exemple : vérifier si l'utilisateur est lié à la mission ou possède un rôle spécifique
        if ($user === $orderMission->getUser() || in_array('ROLE_MANAGER', $user->getRoles())) {
            // Changer le statut à VALIDÉ
            $orderMission->setStatus(Status::VALIDATED);

            // Validation du CSRF Token
            if (!$this->isCsrfTokenValid('envoyer' . $orderMission->getId(), $request->request->get('_token'))) {
                throw $this->createAccessDeniedException('Invalid CSRF token.');
            }

            $entityManager->flush();

            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->success('Ordre de mission envoyé avec succès.');
        } else {
            // L'utilisateur n'a pas les droits
            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->error('Vous n’avez pas les droits pour envoyer cet ordre de mission.');
        }

        return $this->redirectToRoute('app_order_mission_index', ['id' => $orderMission->getId()]);
    }



    #[Route('/{id}', name: 'app_order_mission_show', methods: ['GET'])]
    public function show(OrderMission $orderMission, EntityManagerInterface $entityManager, Request $request,): Response
    {

        return $this->render('order_mission/show.html.twig', [
            'order_mission' => $orderMission,
        ]);

    }


//    #[Route('/{id}/approve', name: 'app_order_mission_approve', methods: ['POST'])]
//    #[IsGranted('ROLE_MANAGER1')]
//    public function approve(OrderMission $orderMission, EntityManagerInterface $entityManager): Response
//    {
//        if ($this->isGranted('ROLE_MANAGER1')) {
//            $orderMission->setStatus(Status::APPROUVED);
//
//            flash()
//                ->options([
//                    'timeout' => 5000,
//                    'position' => 'bottom-right',
//                ])
//                ->success('Ordre de mission approuvé avec succès.');
//            $entityManager->flush();
//
//
//        }
//
//        return $this->redirectToRoute('app_order_mission_show', ['id' => $orderMission->getId()]);
//    }
//
//
//    #[Route('/{id}/cancel', name: 'app_order_mission_cancel', methods: ['POST'])]
//    #[IsGranted('ROLE_MANAGER1')]
//    public function cancel(OrderMission $orderMission, EntityManagerInterface $entityManager): Response
//    {
//        if ($this->isGranted('ROLE_MANAGER1')) {
//            $orderMission->setStatus(Status::CANCELLED);
//
//            flash()
//                ->options([
//                    'timeout' => 5000,
//                    'position' => 'bottom-right',
//                ])
//                ->error('Ordre de mission annulé avec succès.');
//            $entityManager->flush();
//        }
//
//        return $this->redirectToRoute('app_order_mission_show', ['id' => $orderMission->getId()]);
//    }

//    #[Route('/{id}/process', name: 'app_order_mission_process', methods: ['POST'])]
//    #[IsGranted('ROLE_MANAGER1')]
//    public function process(
//        OrderMission $orderMission,
//        Request $request,
//        EntityManagerInterface $entityManager
//    ): Response {
//        // Récupérer l'action (approve ou cancel) depuis la requête
//        $action = $request->request->get('action');
//
//        if ($this->isGranted('ROLE_MANAGER1')) {
//            if ($action === 'approve') {
//                $orderMission->setStatus(Status::APPROUVED);
//
//                flash()
//                    ->options([
//                        'timeout' => 5000,
//                        'position' => 'bottom-right',
//                    ])
//                    ->success('Ordre de mission approuvé avec succès.');
//            }
//
//            elseif ($action === 'cancel') {
//                $orderMission->setStatus(Status::CANCELLED);
//
//                flash()
//                    ->options([
//                        'timeout' => 5000,
//                        'position' => 'bottom-right',
//                    ])
//                    ->error('Ordre de mission annulé avec succès.');
//            }
//
//            $entityManager->flush();
//        }
//
//        return $this->redirectToRoute('app_order_mission_show', ['id' => $orderMission->getId()]);
//    }


    #[Route('/{id}/edit', name: 'app_order_mission_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OrderMission $orderMission, EntityManagerInterface $entityManager) : Response
    {

        $form =$this->createForm(OrderMissionType::class, $orderMission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            flash()
                ->options([
                    'timeout' => 5000, //3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Ordre de mission modifiée avec succès !');

            return $this->redirectToRoute('app_order_mission_index');
        }

        return $this->render('order_mission/edit.html.twig', [
            'orderMission' => $orderMission,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/print', name: 'app_order_mission_print', methods: ['GET'])]
        public function print(OrderMission $orderMission) : Response {

        return $this->render('order_mission/print.html.twig', [
            'order' => $orderMission
        ]);
    }



    #[Route('/{id}/convert', name: 'app_order_mission_convert', methods: ['GET', 'POST'])]
    public function convert(
        OrderMission            $orderMission,
        Request                 $request,
        EntityManagerInterface  $entityManager,
        JourneeRepository       $journeeRepository,
        JournalCaisseRepository $jcRepository,
        CaisseRepository $caisseRepository,
        CaisseService           $service
    ): Response
    {

        // Récupération de la caisse liée au manager
        /** @var User $user */
        $user = $this->getUser();
//        $caisse = $user->getCaisse();

//        if (!$caisse) {
//            $this->addFlash('error', 'Vous n\'êtes pas associé à une caisse.');
//            return $this->redirectToRoute('app_order_mission_show', ['id' => $orderMission->getId()]);
//        }

        $num_bonMission = $service->refBonMission();

        $bonMission = (new BonMission())
            ->setReference($num_bonMission)
            ->setDate(new \DateTime())
            ->setStatus(Status::EN_ATTENTE)
            ->setBeneficiaire($orderMission->getOrderTo())
            ->setOrderMission($orderMission)
            ->setMontant($orderMission->getGetTo()) //champ montant sert de variable pour stocker entité
            ->setOrderMission($orderMission->setStatus(Status::APPROUVED));
//            ->setCaisse($caisse);

        // Récupérer la caisse secondaire (ou principale selon votre logique)
        $caisseSecondaire = $caisseRepository->findOneBy(['code' => 'C001']);
        $bonMission->setCaisse($caisseSecondaire);

        // Création du formulaire avant la condition
        $form = $this->createForm(BonMissionType::class, $bonMission, [
            'orderMission' => $orderMission,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();

            foreach ($bonMission->getDetailBonMission() as $detail) {
                $detail->setBonMission($bonMission);
                $entityManager->persist($detail);
            }

            $bonMission->setUser($user);

            $orderMission->setStatus(Status::CONVERT);
            $entityManager->persist($bonMission);
            $entityManager->flush();

//            $this->addFlash('success', 'Bon de mission créé avec succès !');

            flash()
                ->options([
                    'timeout' => 5000, //3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Bon de mission créé avec succès !');

            return $this->redirectToRoute('bon_mission_show', ['id' => $bonMission->getId()]);
        }

        return $this->render('bon_mission/new.html.twig', [
            'form' => $form->createView(),
            'orderMission' => $orderMission,
            'bonMission' => $bonMission,

        ]);
    }

    #[Route('/{id}/delete', name: 'app_order_mission_delete', methods: ['POST'])]
    #[IsGranted('ROLE_MANAGER1')]
    public function delete(
        OrderMission $orderMission,
        EntityManagerInterface $entityManager
    ): Response {
        // Vérifiez si le statut est annulé
        if ($orderMission->getStatus() === Status::CANCELLED) {
            $orderMission->SetActive(false);

            $entityManager->flush();

            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->success('Ordre de mission supprimé avec succès.');
        } else {
            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->error('Vous ne pouvez supprimer qu\'un ordre de mission annulé.');
        }

        return $this->redirectToRoute('app_order_mission_index');
    }


}