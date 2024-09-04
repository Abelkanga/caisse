<?php

// src/Controller/JournalCaisseController.php
namespace App\Controller;

use App\Form\JournalCaisseType;
use App\Repository\JournalCaisseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JournalCaisseController extends AbstractController
{
//    #[Route('/journal-caisse', name: 'journal_caisse_index')]
//    public function index(Request $request, JournalCaisseRepository $journalCaisseRepository): Response
//    {
//        $form = $this->createForm(JournalCaisseType::class);
//        $form->handleRequest($request);
//
//        $journalCaisses = [];
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $data = $form->getData();
//            $startDate = $data['startDate'];
//            $endDate = $data['endDate'];
//
//            // Rechercher les opérations dans la période donnée
//            $journalCaisses = $journalCaisseRepository->findByDateRange($startDate, $endDate);
//        }
//
//        return $this->render('journalCaisse/index.html.twig', [
//            'form' => $form->createView(),
//            'journalCaisses' => $journalCaisses,
//        ]);
//    }


}