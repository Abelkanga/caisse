<?php

namespace App\Controller;

use App\Entity\Caisse;
use App\Form\CaisseType;
use App\Repository\CaisseRepository;
use App\Service\CaisseService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/caisse')]
class CaisseController extends AbstractController
{
    #[Route('/index', name: 'caisse_index', methods:['GET'])]
    public function index(CaisseRepository $caisseRepository): Response
    {
        return $this->render('caisse/index.html.twig', [
            'caisse' => $caisseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'caisse_new', methods:['GET','POST'])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $caisse = new Caisse();

        $form = $this->createForm(CaisseType::class,$caisse);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($caisse);
            $manager->flush();
            $this->addFlash('success','Caisse crée avec succès');
            return $this->redirectToRoute('caisse_index');
        }
        return $this->render('caisse/new.html.twig', [
            'form' => $form ,
        ]);
    }

    #[Route('/{id}/edit', name: 'caisse_edit', methods:['GET','POST'])]
    public function edit(Caisse $caisse, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(CaisseType::class,$caisse);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $manager->flush();
            $this->addFlash('success','Caisse modifiée avec succès');
            return  $this->redirectToRoute('caisse_index');
        }
        return $this->render('caisse/edit.html.twig', [
            'form' => $form ,
        ]);
    }

}
