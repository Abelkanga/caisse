<?php

namespace App\Controller;

use App\Entity\Fdb;
use App\Entity\User;
use App\Form\FdbType;
use App\Service\PdfService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FdbController extends AbstractController
{
    #[Route('/fdb', name: 'fdb_index', methods:['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $fdb = $entityManager->getRepository(Fdb::class)->findAll();

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }

#[Route('/fdb/new', name: 'fdb_new', methods: ['GET', 'POST'])]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    $fdb = new Fdb();

    $form = $this->createForm(FdbType::class, $fdb);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        /** @var User $user */
        $user = $this->getUser();
        $fdb->setUser($this->getUser());



        $entityManager->persist($fdb);
        $entityManager->flush();

        return $this->redirectToRoute('fdb_index');
    }

    return $this->render('fdb/new.html.twig', [
        'fdb' => $fdb,
        'form' => $form->createView(),
    ]);
}

#[Route("/{id}/show", name:'fdb_show', methods: ['GET', 'POST'])]
public function show(Fdb $fdb): Response
{
    return $this->render('fdb/show.html.twig', [
        'fdb' => $fdb,
    ]);
}


#[Route('/{id}/edit', name:'fdb_edit', methods: ['GET', 'POST'])]
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


    #[Route('/{id}/pdf', name:'fdb_pdf', methods: ['GET', 'POST'])]
    public function pdf($id, EntityManagerInterface $entityManager, PdfService $pdfService): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $fdbRepository = $entityManager->getRepository(Fdb::class);
        $fdb = $fdbRepository->find($id);

        if (!$fdb) {
            throw $this->createNotFoundException('La fiche de besoin demandée n\'existe pas');
        }

        $pdfService->generatePdf('fdb/pdf.html.twig', [
            'fdb' => $fdb
        ]);

        return $this->redirectToRoute('fdb_index');
    }



#[Route('/{id}/delete', name: 'fdb_delete', methods: ['GET'])]
public function delete(EntityManagerInterface $manager, Fdb $fdb) : Response
{
    $manager->remove($fdb);
    $manager->flush();

    return $this->redirectToRoute('fdb_index');
}

}
