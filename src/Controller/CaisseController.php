<?php

namespace App\Controller;

use App\Entity\Caisse;
use App\Form\CaisseType;
use App\Repository\BonapprovisionnementRepository;
use App\Repository\CaisseRepository;
use App\Repository\DepenseRepository;
use App\Repository\FdbRepository;
use App\Repository\JournalCaisseRepository;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/caisse')]
class CaisseController extends AbstractController
{
    private $entityManager;

    // Injecting the EntityManagerInterface
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/index', name: 'caisse_index', methods:['GET'])]
    public function index(CaisseRepository $caisseRepository): Response
    {
        return $this->render('caisse/index.html.twig', [
            'caisses' => $caisseRepository->findAll(),

        ]);
    }

    #[Route('/new', name: 'caisse_new', methods:['GET','POST'])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {


        $caisse = new Caisse();

        $form = $this->createForm(CaisseType::class, $caisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($caisse);
            $manager->flush();

            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->success('Caisse créée avec succès !');

            return $this->redirectToRoute('caisse_index');
        }

        return $this->render('caisse/new.html.twig', [
            'form' => $form->createView(),
            'caisse' => $caisse,
        ]);
    }

    #[Route('/{id}/edit', name: 'caisse_edit', methods:['GET','POST'])]
    public function edit(Caisse $caisse, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(CaisseType::class,$caisse);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $manager->flush();

            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Caisse modifiée avec succès !');

            return  $this->redirectToRoute('caisse_index');
        }

        return $this->render('caisse/edit.html.twig', [
            'form' => $form ,
        ]);
    }

    #[Route('/etat', name: 'app_etat_caisse', methods: ['GET'])]
    public function getMouvementsCaisse(JournalCaisseRepository $jCRepository, Request $request): JsonResponse {
        $dateDebut = $request->query->get('date_debut');
        $dateFin = $request->query->get('date_fin');

        $data = [];
        $journals = $jCRepository->findReportingJournal($dateDebut,$dateFin);
        foreach ($journals as $journal) {
            $data[] = [
                'date' => date_format($journal->getDate(),'d/m/Y'),
                'num_piece' => $journal->getNumPiece(),
                'libelle' => $journal->getFdb()?->getExpense()->getName() ?? $journal->getIntitule(),
                'debit' => $journal->getEntree() ?? 0,
                'credit' => $journal->getSortie() ?? 0,
                'solde' => $journal->getSolde() ?? 0,
            ];
        }

        return new JsonResponse($data);

    }

}
