<?php

namespace App\Controller;

use App\Entity\Fdb;
use App\Form\FdbType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FdbController extends AbstractController
{
    #[Route('/fdb', name: 'fdb_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $fdbs = $entityManager->getRepository(Fdb::class)->findAll();

        return $this->render('fdb/index.html.twig', [
            'fdbs' => $fdbs,
        ]);
    }

    #[Route('/fdb/nouveau', name: 'fdb_new
    ', methods: ['GET'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fdb = new Fdb();
        $form = $this->createForm(FdbType::class, $fdb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fdb);
            $entityManager->flush();

            return $this->redirectToRoute('fdb_index');
        }

        return $this->render('fdb/new.html.twig', [
            'fdb' => $fdb,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fdb_show", methods={"GET"})
     */
    public function show(Fdb $fdb): Response
    {
        return $this->render('fdb/show.html.twig', [
            'fdb' => $fdb,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fdb_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fdb $fdb, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FdbType::class, $fdb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('fdb_index');
        }

        return $this->render('fdb/edit.html.twig', [
            'fdb' => $fdb,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fdb_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fdb $fdb, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fdb->getId(), $request->request->get('_token'))) {
            $entityManager->remove($fdb);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fdb_index');
    }
}
