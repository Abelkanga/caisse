<?php

namespace App\Controller;

use App\Entity\Caisse;
use App\Form\CaisseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/caisse")
 */
class CaisseController extends AbstractController
{
    /**
     * @Route("/", name="caisse_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $caisses = $entityManager->getRepository(Caisse::class)->findAll();

        return $this->render('caisse/index.html.twig', [
            'caisses' => $caisses,
        ]);
    }

    /**
     * @Route("/new", name="caisse_new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $caisse = new Caisse();
        $form = $this->createForm(CaisseType::class, $caisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($caisse);
            $entityManager->flush();

            return $this->redirectToRoute('caisse_index');
        }

        return $this->render('caisse/new.html.twig', [
            'caisse' => $caisse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="caisse_show", methods={"GET"})
     */
    public function show(Caisse $caisse): Response
    {
        return $this->render('caisse/show.html.twig', [
            'caisse' => $caisse,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="caisse_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Caisse $caisse, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CaisseType::class, $caisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('caisse_index');
        }

        return $this->render('caisse/edit.html.twig', [
            'caisse' => $caisse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="caisse_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Caisse $caisse, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$caisse->getId(), $request->request->get('_token'))) {
            $entityManager->remove($caisse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('caisse_index');
    }
}

