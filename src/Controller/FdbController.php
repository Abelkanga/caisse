<?php

namespace App\Controller;

use App\Entity\BonCaisse;
use App\Entity\Expense;
use App\Entity\Fdb;
use App\Entity\User;
use App\Form\FdbType;
use App\Repository\BonCaisseRepository;
use App\Repository\FdbRepository;
use App\Repository\JourneeRepository;
use App\Service\CaisseService;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FdbController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }



    #[Route('/fdb', name: 'fdb_index', methods:['GET'])]
    public function index(FdbRepository $repository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $fdb = $repository->findByUserRole($user);  // Utilise la méthode filtrant les fiches actives uniquement

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb,
        ]);
    }

    #[Route('/fdb/bonCaisse', name: 'fdb_indexBonCaisse', methods:['GET'])]
    public function indexBonCaisse( BonCaisseRepository $bonCaisseRepository): Response
    {
        $boncaisse = $bonCaisseRepository->findAll();

        return $this->render('fdb/index_encaissement.html.twig', [
            'bonCaisse' => $boncaisse
        ]);
    }

    #[Route('/fdb/pending', name: 'fdb_pending', methods:['GET'])]
    public function index_pending(FdbRepository $fdbRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $fdb = $fdbRepository->findPendingByUserRole($user);

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }

    #[Route('/fdb/cancel', name: 'fdb_cancel', methods:['GET'])]
    public function index_canceled(FdbRepository $fdbRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $fdb = $fdbRepository->findFdbCancelByUserRole($user);

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }

    #[Route('/fdb/approuve', name: 'fdb_approuve', methods:['GET'])]
    public function index_approuve(FdbRepository $fdbRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $fdb = $fdbRepository->findFdbApprouveByUserRole($user);

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }


    #[Route('/fdb/validate', name: 'fdb_validate', methods:['GET'])]
    public function index_validated(FdbRepository $fdbRepository): Response
    {
        $fdb = $fdbRepository->findFdbValidate();

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }



    #[Route('/fdb/new', name: 'fdb_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, CaisseService $service): Response
    {
        $num_fdb = $service->refFdb();
        $fdb = (new Fdb())->setDate(new \DateTime())->setDestinataire('Konan Gwladys')->setNumeroFicheBesoin($num_fdb);

        $form = $this->createForm(FdbType::class, $fdb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $fdb->setUser($user)->setStatus(Status::EN_ATTENTE);

            $detail = $fdb->getDetails();
            foreach ($detail as $d) {
                $d->setFdb($fdb);

                $entityManager->persist($d);
            }

            $entityManager->persist($fdb);
            $entityManager->flush();

//            flash()->success('Fiche de besoin enregistré avec succès !');

            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Fiche de besoin enregistré avec succès ! ');

            return $this->redirectToRoute('fdb_index');
        }

        return $this->render('fdb/new.html.twig', [
            'fdb' => $fdb,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/fdb/expenses', name: 'f_expenses_by_type', methods:['POST'])]
    public function getExpensesByType(Request $request): JsonResponse
    {
        $typeExpenseId = $request->request->get('typeExpense');

        if ($typeExpenseId) {
            $expenses = $this->entityManager
                ->getRepository(Expense::class)
                ->findBy(['typeExpense' => $typeExpenseId]);

            $responseArray = [];
            foreach ($expenses as $expense) {
                $responseArray[] = [
                    'id' => $expense->getId(),
                    'name' => $expense->getName(),
                ];
            }

            return new JsonResponse($responseArray);
        }

        return new JsonResponse([]);
    }

    #[Route("/fdb/{id}/show", name:'fdb_show', methods: ['GET', 'POST'])]
    public function show(Fdb $fdb, Request $request, EntityManagerInterface $entityManager, JourneeRepository $journeeRepository): Response
    {

        $total = 0;
        foreach ($fdb->getDetails() as $detail) {
            $montant = $detail->getMontant();
            if ($montant) {
                $total += $montant;
            }
        }

        $user = $this->getUser();

        if ($this->isGranted('ROLE_MANAGER')) {
            $caisse = $user->getCaisse();

            if (!$caisse) {
                // L'utilisateur manager n'est pas lié à une caisse
                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->error('Vous n\'êtes pas associé à une caisse.');

                return $this->redirectToRoute('app_welcome');
            }

            $activeJournee = $journeeRepository->findOneBy(['caisse' => $caisse, 'active' => true]);

            if (!$activeJournee) {
                // Aucune journée active n'est trouvée pour la caisse de l'utilisateur
                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->error('Vous devez ouvrir la caisse avant d\'approuver une dépense.');

                return $this->redirectToRoute('app_comptability_caisse_journee_open');
            }
        }


        if ($request->isMethod('POST') && $this->isCsrfTokenValid('validate-caisse-fdb', $request->request->get('_token'))) {
            $user = $this->getUser();

            if ($request->request->has('confirm_responsable') && ($this->isGranted('ROLE_RESPONSABLE') || $user->getIsTemporary())) {
                $fdb->setStatus(Status::VALIDATED);
                $entityManager->persist($fdb);
                $entityManager->flush();

                flash()
                    ->options([
                        'timeout' => 5000, // 3 seconds
                        'position' => 'bottom-right',
                    ])
                    ->success('Fiche de besoin confirmé avec succès ! ');

                return $this->redirectToRoute('app_welcome');
            }

            if ($request->request->has('cancel_responsable') && ($this->isGranted('ROLE_RESPONSABLE') || $user->getIsTemporary())) {
                $fdb->setStatus(Status::CANCELLED);
                $entityManager->persist($fdb);
                $entityManager->flush();


                flash()
                    ->options([
                        'timeout' => 5000, // 3 seconds
                        'position' => 'bottom-right',
                    ])
                    ->warning('Fiche de besoin annulé ! ');

                return $this->redirectToRoute('app_welcome');
            }

            if ($request->request->has('confirm_manager') && $this->isGranted('ROLE_MANAGER')) {
                $caisse = $user->getCaisse();


                    $solde = $caisse->getSoldedispo();
                    $total = $fdb->getTotal();

                    if ($solde < $total) {

//                        $this->addFlash('error', 'Pas de fond disponible pour effectuer cette opération');

                        flash()
                            ->options([
                                'timeout' => 5000, // 3 seconds
                                'position' => 'bottom-right',
                            ])
                            ->error('Pas de fond disponible pour effectuer cette opération');

                        return $this->redirectToRoute('app_welcome');
                    }

                    $caisse->setSoldedispo($solde - $total);
                    $fdb->setStatus(Status::APPROUVE);

                    $bonCaisse = new BonCaisse();
                    $bonCaisse->setStatus(Status::APPROUVE);
                    $bonCaisse->setDate(new \DateTime());
                    $bonCaisse->setMontant($fdb->getTotal());
                    $bonCaisse->setCaisse($caisse);
                    $bonCaisse->setFdb($fdb);

                    $entityManager->persist($bonCaisse);
                    $entityManager->persist($fdb);
                    $entityManager->persist($caisse);
                    $entityManager->flush();

                flash()
                    ->options([
                        'timeout' => 5000, // 3 seconds
                        'position' => 'bottom-right',
                    ])
                    ->success('Fiche de besoin approuvée avec succès ! ');


                    return $this->redirectToRoute('app_welcome');
                }
            }

            return $this->render('fdb/show.html.twig', [
                'fdb' => $fdb,
                'total' => $total,
            ]);

    }

    #[Route('/fdb/{id}/edit', name:'fdb_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fdb $fdb, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FdbType::class, $fdb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();


//            flash()->success('Fiche de besoin modifiée avec succès !');

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

    #[Route('/fdb/etat', name: 'fdb_etat', methods: ['GET'])]
    public function getFdbEtat(FdbRepository $fdbRepository, Request $request): Response
    {
        $dateDebut = $request->query->get('date_debut') ? new \DateTime($request->query->get('date_debut')) : null;
        $dateFin = $request->query->get('date_fin') ? new \DateTime($request->query->get('date_fin')) : null;
        $status = $request->query->get('status');

        $fdbResults = [];
        $total = 0;

        $fdbQueryBuilder = $fdbRepository->createQueryBuilder('fdb');

        if ($dateDebut && $dateFin) {
            $fdbQueryBuilder->where('fdb.date BETWEEN :date_debut AND :date_fin')
                ->setParameter('date_debut', $dateDebut)
                ->setParameter('date_fin', $dateFin);
        }

        if ($status && $status !== 'TOUS') {
            $fdbQueryBuilder->andWhere('fdb.status = :status')
                ->setParameter('status', $status);
        }

        $fdbResults = $fdbQueryBuilder->getQuery()->getResult();
        $total = count($fdbResults);

        return $this->render('fdb/etat.html.twig', [
            'fdbResults' => $fdbResults,
            'total' => $total,
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

// src/Controller/FdbController.php

    #[Route('/fdb/{id}/delete', name: 'fdb_delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $manager, Fdb $fdb): Response
    {
        $user = $this->getUser();

        // Vérifier que l'utilisateur a le rôle `ROLE_SAISIE`, que la fiche lui appartient, et qu'elle est annulée et active
        if (in_array('ROLE_USER', $user->getRoles()) && $fdb->getUser() === $user && $fdb->getStatus() === Status::CANCELLED && $fdb->getIsActive()) {
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

}
