<?php

namespace App\Controller;

use App\Entity\Depense;
use App\Entity\User;
use App\Form\DepenseType;
use App\Service\PdfService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DepenseController extends AbstractController
{

    #[Route('/depense', name: 'depense_index', methods:['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $depense = $entityManager->getRepository(Depense::class)->findAll();

        return $this->render('depense/index.html.twig', [
            'depense' => $depense,
        ]);
    }

    #[Route('/depense/new', name: 'depense_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $depense = new Depense();

        $form = $this->createForm(DepenseType::class, $depense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $depense->setUser($this->getUser());

            $entityManager->persist($depense);
            $entityManager->flush();

            return $this->redirectToRoute('depense_index');
        }

        return $this->render('depense/new.html.twig', [
            'depense' => $depense,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/depense/{id}/show', name: 'depense_show', methods: ['GET', 'POST'])]
    public function show(Depense $depense): Response
    {
        return $this->render('depense/show.html.twig', [
            'depense' => $depense,
            ]);
    }

    #[Route('/depense/{id}/edit', name:'depense_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Depense $depense, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DepenseType::class, $depense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('depense_index');
        }

        return $this->render('depense/edit.html.twig', [
            'depense' => $depense,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/depense/{id}/pdf', name:'depense_pdf', methods: ['GET', 'POST'])]
    public function pdf($id, EntityManagerInterface $entityManager, PdfService $pdfService,): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $depenseRepository = $entityManager->getRepository(Depense::class);
        $depense = $depenseRepository->find($id);

        if (!$depense) {
            throw $this->createNotFoundException('La depense demandée n\'existe pas');
        }

        $pdfService->generatePdf('depense/pdf.html.twig', [
            'depense' => $depense
        ]);

        return $this->redirectToRoute('depense_index');
    }

    #[Route('/depense/{id}/delete', name: 'depense_delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $manager, Depense $depense) : Response
    {
        $manager->remove($depense);
        $manager->flush();

        return $this->redirectToRoute('depense_index');
    }



}


