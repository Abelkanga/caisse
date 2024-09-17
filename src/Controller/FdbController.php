<?php

namespace App\Controller;

use App\Entity\BonCaisse;
use App\Entity\Caisse;
use App\Entity\Expense;
use App\Entity\Fdb;
use App\Entity\JournalCaisse;
use App\Entity\User;
use App\Form\BonCaisseType;
use App\Form\FdbType;
use App\Repository\BonCaisseRepository;
use App\Repository\FdbRepository;
use App\Repository\JournalCaisseRepository;
use App\Repository\JourneeRepository;
use App\Service\CaisseService;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Pusher\Pusher;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Uid\Uuid;

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

    #[Route('/fdb/brouillon', name: 'fdb_brouillon', methods:['GET'])]
    public function index_brouillon(FdbRepository $fdbRepository): Response
    {
        $fdb = $fdbRepository->findFdbBrouillon();

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

    #[Route('/fdb/approuved', name: 'fdb_approuved', methods:['GET'])]
    public function index_approuved(FdbRepository $fdbRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $fdb = $fdbRepository->findFdbApprouvedByUserRole($user);

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
    public function new(Request $request,
                        EntityManagerInterface $entityManager,
                        CaisseService $service,
                        JourneeRepository $journeeRepository): Response
    {
        $activeJournee = $journeeRepository->activeJournee();
        $num_fdb = $service->refFdb();
        $fdb = (new Fdb())->setDate(new \DateTime())->setNumeroFicheBesoin($num_fdb)->setDestinataire('Konan Gwladys');
        $form = $this->createForm(FdbType::class, $fdb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $roles = $user->getRoles();

            // ROLE_RESPONSABLE crée directement EN_ATTENTE
            if (in_array('ROLE_RESPONSABLE', $roles)) {
                $fdb->setStatus(Status::EN_ATTENTE);
            } else {
                $fdb->setStatus(Status::BROUILLON);
            }

            $fdb
                ->setUser($user)
                ->setJournee($activeJournee)
            ;
            foreach ($fdb->getDetails() as $detail) {
                $detail->setFdb($fdb);
                $entityManager->persist($detail);
            }

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

    #[Route('/fdb/send/{id}', name: 'fdb_send', methods: ['GET'])]
    public function sendFdb(Fdb $fdb, EntityManagerInterface $entityManager): Response
    {
        // Permettre l'envoi pour les utilisateurs avec ROLE_USER et ROLE_IMPRESSION
        if ($this->isGranted('ROLE_USER') || $this->isGranted('ROLE_IMPRESSION')) {

            if ($fdb->getStatus() === Status::BROUILLON) {
                $fdb->setStatus(Status::EN_ATTENTE);
                $entityManager->persist($fdb);
                $entityManager->flush();

                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->success('Fiche de besoin envoyée avec succès ! ');

                return $this->redirectToRoute('fdb_index');
            } else {
                $this->addFlash('warning', 'Cette fiche de besoin ne peut pas être envoyée.');
            }
        }

        return $this->redirectToRoute('fdb_show', ['id' => $fdb->getId()]);
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
    public function show(Fdb $fdb,
                         Request $request,
                         EntityManagerInterface $entityManager,
                         JourneeRepository $journeeRepository,
//                         Pusher $pusher
    ): Response
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
                    ->error('Vous devez ouvrir la caisse avant de convertir ou consulter une fiche de besoin.');

                return $this->redirectToRoute('app_comptability_caisse_journee_open');
            }
        }


        if ($request->isMethod('POST') && $this->isCsrfTokenValid('validate-caisse-fdb', $request->request->get('_token'))) {
            $user = $this->getUser();

            if ($request->request->has('confirm_responsable') && ($this->isGranted('ROLE_RESPONSABLE') || $user->getIsTemporary())) {
                $fdb->setStatus(Status::VALIDATED);
                $entityManager->persist($fdb);

//                $data = [];
//                $notification = $notificationRepository->findOneBy(['document' => $fdb]);

//                if ($notification) {
//                    $data = [
//                        'id' => $notification->getId(),
//                        'link' => $notification->getLinkTo(),
//                        'message' => "Fiche de besoin validée.",
//                        'reference' => $notification->getDocument()->getReference(),
//                        'user_id' => $notification->getOwner()->getId()
//                    ];
//                    $pusher->trigger('notification', 'notify-me', $data);
//                }
//                $notification->setUnread(true);

                $entityManager->flush();

                flash()
                    ->options([
                        'timeout' => 5000, // 3 seconds
                        'position' => 'bottom-right',
                    ])
                    ->success('Fiche de besoin validée avec succès ! ');

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

            if ($request->request->has('send_fdb') && $this->isGranted('ROLE_USER') && $fdb->getStatus() === Status::BROUILLON) {
                $fdb->setStatus(Status::EN_ATTENTE);
                $entityManager->persist($fdb);
                $entityManager->flush();

                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->success('Fiche de besoin envoyée avec succès !');

                return $this->redirectToRoute('fdb_show', ['id' => $fdb->getId()]);
            }

            if ($request->request->has('confirm_manager1') && $this->isGranted('ROLE_MANAGER1')) {
                $fdb->setStatus(Status::APPROUVED);
                $entityManager->persist($fdb);
                $entityManager->flush();

                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->success('Fiche de besoin approuvée avec succès !');

                return $this->redirectToRoute('app_welcome');
            }

            if ($request->request->has('confirm_manager') && $this->isGranted('ROLE_MANAGER')) {
                $caisse = $user->getCaisse();

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

                    $caisse->setSoldedispo($solde - $total);
//                    $fdb->setStatus(Status::CONVERT);

                    $bonCaisse = new BonCaisse();
//                    $bonCaisse->setStatus(Status::CONVERT);
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
            'operation_type' => 'decaissement', // ajout de cette variable
        ]);

    }
    #[Route('/fdb/{uuid}/convert', name: 'fdb_convert', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_MANAGER')]
    public function convert(
        Fdb $fdb,
        FdbRepository $fdbRepository,
        BonCaisseRepository $bonCaisseRepository,
        Request $request,
        EntityManagerInterface $entityManager,
        JourneeRepository $journeeRepository,
        JournalCaisseRepository $jcRepository,
        CaisseService $service
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

            $num_journalCaisse = $service->refJournalCaisse();
            $amount = $fdb->getTotal();
            $lastSolde = $jcRepository->getLastSolde($caisse->getId());

            $journalCaisse = (new JournalCaisse())
                ->setNumPiece($num_journalCaisse)
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


    #[Route('/fdb/{id}/edit', name:'fdb_edit', methods: ['GET', 'POST'])]
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

}
