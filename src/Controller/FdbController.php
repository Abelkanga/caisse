<?php

namespace App\Controller;

use App\Entity\Fdb;
use App\Form\FdbType;
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
        // Vous pouvez ajouter ici du code pour gérer les informations spécifiques à votre cahier des charges
        // Par exemple, pour définir le numéro de la fiche de besoin :
        $fdb->setNumeroFicheBesoin('N°OSC/' . date('Y') . '/' . rand(1, 100));

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

#[Route('/{id}/delete', name: 'fdb_delete', methods: ['GET'])]
public function delete(EntityManagerInterface $manager, Fdb $fdb) : Response
{
    $manager->remove($fdb);
    $manager->flush();

    return $this->redirectToRoute('fdb_index');
}

}
