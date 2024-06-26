<?php

namespace App\Controller;

use App\Entity\BonCaisse;
use App\Entity\Depense;
use App\Entity\Expense;
use App\Entity\User;
use App\Form\DepenseType;
use App\Repository\DepenseRepository;
use App\Service\CaisseService;
use App\Utils\Status;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;


class DepenseController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/depense', name: 'depense_index', methods:['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $depense = $entityManager->getRepository(Depense::class)->findAll();

        return $this->render('depense/index.html.twig', [
            'depense' => $depense,
        ]);
    }

    #[Route('/depense/pending', name: 'depense_pending', methods:['GET'])]
    public function index_pending(DepenseRepository $depenseRepository): Response
    {
        $depense = $depenseRepository->findDepensePending();

        return $this->render('depense/index.html.twig', [
            'depense' => $depense
        ]);
    }

    #[Route('/depense/validate', name: 'depense_validate', methods:['GET'])]
    public function index_validated(DepenseRepository $depenseRepository): Response
    {
        $depense = $depenseRepository->findDepenseValidate();

        return $this->render('depense/index.html.twig', [
            'depense' => $depense
        ]);
    }


    #[Route('/depense/new', name: 'depense_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, CaisseService $service): Response
    {
        $depense = new Depense();

        $form = $this->createForm(DepenseType::class, $depense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $depense->setUser($user)->setStatus(Status::EN_ATTENTE);

            $detail = $depense->getDetails();
            foreach ($detail as $d) {
                $d->setDepense($depense);

                $entityManager->persist($d);
            }


            $entityManager->persist($depense);
            $entityManager->flush();
//            flash()->success('Dépense enregistrée avec succès !');

            return $this->redirectToRoute('depense_index');
        }

        return $this->render('depense/new.html.twig', [
            'depense' => $depense,
            'form' => $form->createView(),
        ]);
    }


    #[Route('/depense/expenses', name: 'd_expenses_by_type', methods:['POST'])]
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


    #[Route('/depense/{id}/show', name: 'depense_show', methods: ['GET', 'POST'])]
    public function show(Depense $depense, Request $request, EntityManagerInterface $entityManager): Response
    {

        $total = 0;
        foreach ($depense->getDetails() as $detail) {
            $montant = $detail->getMontant();
            if ($montant) {
                $total += $montant;
            }
        }


        if ($request->isMethod('POST') && $this->isCsrfTokenValid('validate-caisse-depense', $request->request->get('_token'))) {
            if($request->request->has('confirm')) {
                /** @var User $user */
                $user = $this->getUser();
                $caisse = $user->getCaisse();
                $solde = $caisse->getSoldedispo();
                $total = $depense->getTotal();

                $caisse->setSoldedispo($solde - $total);
                $depense->setStatus(Status::VALIDATED);

                $bonCaisse = new BonCaisse();
                $bonCaisse->setStatus(Status::VALIDATED);
                $bonCaisse->setDate(new \DateTime());
                $bonCaisse->setMontant($depense->getMontant());
                $bonCaisse->setCaisse($caisse);
                $bonCaisse->setDepense($depense);

                $entityManager->persist($bonCaisse);

                $entityManager->persist($depense);
                $entityManager->persist($caisse);

                $entityManager->flush();


                return $this->redirectToRoute('app_welcome');

            }
        }

        return $this->render('depense/show.html.twig', [
            'depense' => $depense,
            'total' => $total
        ]);
    }

    #[Route('/depense/{id}/edit', name:'depense_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Depense $depense, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DepenseType::class, $depense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

//            flash()->success('Dépense modifiée avec succès !');
            return $this->redirectToRoute('depense_index');
        }

        return $this->render('depense/edit.html.twig', [
            'depense' => $depense,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/depense/{uuid}/print', name: 'print_depense', methods: ['GET'])]
    public function print(Depense $depense): Response
    {
        return $this->render('depense/print.html.twig', [
            'depense' => $depense
        ]);
    }

    #[Route('/depense/{id}/delete', name: 'depense_delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $manager, Depense $depense) : Response
    {
        $manager->remove($depense);
        $manager->flush();

//        flash()->success('Dépense supprimée avec succès !');

        return $this->redirectToRoute('depense_index');
    }

}


