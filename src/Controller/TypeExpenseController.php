<?php

namespace App\Controller;

use App\Entity\TypeExpense;
use App\Form\TypeExpenseType;
use App\Repository\TypeExpenseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/type-expense')]
class TypeExpenseController extends AbstractController
{
    #[Route('/', name: 'app_type_expense_index', methods: ['GET'])]
    public function index(TypeExpenseRepository $typeExpenseRepository): Response
    {
        return $this->render('type_expense/index.html.twig', [
            'type_expenses' => $typeExpenseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_expense_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeExpense = new TypeExpense();
        $form = $this->createForm(TypeExpenseType::class, $typeExpense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeExpense);
            $entityManager->flush();

            return $this->redirectToRoute('app_type_expense_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_expense/new.html.twig', [
            'type_expense' => $typeExpense,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_expense_show', methods: ['GET'])]
    public function show(TypeExpense $typeExpense): Response
    {
        return $this->render('type_expense/show.html.twig', [
            'type_expense' => $typeExpense,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_expense_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeExpense $typeExpense, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypeExpenseType::class, $typeExpense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_type_expense_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_expense/edit.html.twig', [
            'type_expense' => $typeExpense,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_expense_delete', methods: ['POST'])]
    public function delete(Request $request, TypeExpense $typeExpense, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeExpense->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($typeExpense);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_type_expense_index', [], Response::HTTP_SEE_OTHER);
    }
}
