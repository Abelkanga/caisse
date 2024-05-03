<?php

namespace App\Controller;

use App\Entity\Depense;
use App\Form\DepenseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/depense")
 */
class DepenseController extends AbstractController
{
    /**
     * @Route("/", name="depense_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $depenses = $entityManager->getRepository(Depense::class)->findAll();

        return $this->render('depense/index.html.twig', [
            'depenses' => $depenses,
        ]);
    }

    /**
     * @Route("/new", name="depense_new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $depense = new Depense();
        $form = $this->createForm(DepenseType::class, $depense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($depense);
            $entityManager->flush();

            return $this->redirectToRoute('depense_index');
        }

        return $this->render('depense/new.html.twig', [
            'depense' => $depense,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="depense_show", methods={"GET"})
     */
    public function show(Depense $depense): Response
    {
        return $this->render('depense/show.html.twig', [
            'depense' => $depense,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="depense_edit", methods={"GET","POST"})
     */
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

    /**
     * @Route("/{id}", name="depense_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Depense $depense, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$depense->getId(), $request->request->get('_token'))) {
            $entityManager->remove($depense);
            $entityManager->flush();
        }

        return $this->redirectToRoute('depense_index');
    }
}
