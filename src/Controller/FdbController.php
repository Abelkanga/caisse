<?php

namespace App\Controller;

use App\Entity\BonCaisse;
use App\Entity\Expense;
use App\Entity\Fdb;
use App\Entity\User;
use App\Form\FdbType;
use App\Repository\BonCaisseRepository;
use App\Repository\FdbRepository;
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
    public function index( FdbRepository $fdbRepository): Response
    {
        $fdb = $fdbRepository->findAll();

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
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
        $fdb = $fdbRepository->findFdbPending();

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

    #[Route('/fdb/cancel', name: 'fdb_cancel', methods:['GET'])]
    public function index_canceled(FdbRepository $fdbRepository): Response
    {
        $fdb = $fdbRepository->findFdbCancel();

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
    public function show(Fdb $fdb, Request $request, EntityManagerInterface $entityManager): Response
    {

        $total = 0;
        foreach ($fdb->getDetails() as $detail) {
            $montant = $detail->getMontant();
            if ($montant) {
                $total += $montant;
            }
        }

        if ($request->isMethod('POST') && $this->isCsrfTokenValid('validate-caisse-fdb', $request->request->get('_token'))) {
            if($request->request->has('confirm')) {
                /** @var User $user */
                $user = $this->getUser();
                $caisse = $user->getCaisse();
                $solde = $caisse->getSoldedispo();
                $total = $fdb->getTotal();

                if ($solde < $total) {
                    flash()->error('Pas de fond disponible pour effectuer cette opération');

                    return $this->redirectToRoute('app_welcome');
                }

                $caisse->setSoldedispo($solde - $total);
                $fdb->setStatus(Status::VALIDATED);

                $bonCaisse = new BonCaisse();
                $bonCaisse->setStatus(Status::VALIDATED);
                $bonCaisse->setDate(new \DateTime());
                $bonCaisse->setMontant($fdb->getTotal());
                $bonCaisse->setCaisse($caisse);
                $bonCaisse->setFdb($fdb);

                $entityManager->persist($bonCaisse);


                $entityManager->persist($fdb);
                $entityManager->persist($caisse);

                $entityManager->flush();
//                $this->addFlash('success','Fiche de besoin enregistrée avec succès');

                return $this->redirectToRoute('app_welcome');

            }
        }

        return $this->render('fdb/show.html.twig', [
            'fdb' => $fdb,
            'total' => $total

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
            return $this->redirectToRoute('fdb_index');
        }

        return $this->render('fdb/edit.html.twig', [
            'fdb' => $fdb,
            'form' => $form->createView(),
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
    public function delete(EntityManagerInterface $manager, Fdb $fdb) : Response
    {
        $manager->remove($fdb);
        $manager->flush();
//        flash()->success('Fiche de besoin supprimée avec succès !');

        return $this->redirectToRoute('fdb_index');
    }


}
