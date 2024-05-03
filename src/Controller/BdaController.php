<?php

namespace App\Controller;

use App\Entity\Bda;
use App\Form\BdaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bda")
 */
class BdaController extends AbstractController
{
    /**
     * @Route("/", name="bda_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $bdas = $entityManager->getRepository(Bda::class)->findAll();

        return $this->render('bda/index.html.twig', [
            'bdas' => $bdas,
        ]);
    }

    /**
     * @Route("/new", name="bda_new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bda = new Bda();
        $form = $this->createForm(BdaType::class, $bda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bda);
            $entityManager->flush();

            return $this->redirectToRoute('bda_index');
        }

        return $this->render('bda/new.html.twig', [
            'bda' => $bda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bda_show", methods={"GET"})
     */
    public function show(Bda $bda): Response
    {
        return $this->render('bda/show.html.twig', [
            'bda' => $bda,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bda_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bda $bda, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BdaType::class, $bda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('bda_index');
        }

        return $this->render('bda/edit.html.twig', [
            'bda' => $bda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bda_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Bda $bda, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bda->getId(), $request->request->get('_token'))) {
            $entityManager->remove($bda);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bda_index');
    }
}
