<?php

namespace App\Controller;

use App\Entity\Caisse;
use App\Form\CaisseType;
use App\Repository\BonapprovisionnementRepository;
use App\Repository\CaisseRepository;
use App\Repository\DepenseRepository;
use App\Repository\FdbRepository;
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
//            flash()->success('Caisse créée avec succès !');
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
//            flash()->success('Caisse modifiée avec succès !');
            return  $this->redirectToRoute('caisse_index');
        }
        return $this->render('caisse/edit.html.twig', [
            'form' => $form ,
        ]);
    }


    // src/Controller/CaisseController.php

    #[Route('/etat', name: 'app_etat_caisse', methods: ['GET'])]
    public function getMouvementsCaisse(FdbRepository $fdbRepository, BonapprovisionnementRepository $bonapprovisionnementRepository, Request $request): Response {
        $dateDebut = $request->query->get('date_debut') ? new \DateTime($request->query->get('date_debut')) : null;
        $dateFin = $request->query->get('date_fin') ? new \DateTime($request->query->get('date_fin')) : null;

        $mouvements = [];
        $solde = 0;
        $totalEntree = 0;
        $totalSortie = 0;

        if ($dateDebut && $dateFin) {
            $fdbQuery = $fdbRepository->createQueryBuilder('fdb')
                ->where('fdb.date BETWEEN :date_debut AND :date_fin')
                ->setParameter('date_debut', $dateDebut)
                ->setParameter('date_fin', $dateFin)
                ->getQuery()
                ->getResult();

            foreach ($fdbQuery as $fdb) {
                $mouvements[] = [
                    'date' => $fdb->getDate(),
                    'nature' => $fdb->getTypeExpense(),
                    'libelle' => $fdb->getExpense(),
                    'entree' => null,
                    'sortie' => $fdb->getTotal(),
                ];
                $totalSortie += $fdb->getTotal();
                $solde -= $fdb->getTotal();
            }

            $bonapprovisionnementQuery = $bonapprovisionnementRepository->createQueryBuilder('ba')
                ->where('ba.date BETWEEN :date_debut AND :date_fin')
                ->setParameter('date_debut', $dateDebut)
                ->setParameter('date_fin', $dateFin)
                ->getQuery()
                ->getResult();

            foreach ($bonapprovisionnementQuery as $bonapprovisionnement) {
                $mouvements[] = [
                    'date' => $bonapprovisionnement->getDate(),
                    'nature' => 'Approvisionnement de la caisse',
                    'libelle' => 'Approvisionnement de la caisse',
                    'entree' => $bonapprovisionnement->getMontanttotal(),
                    'sortie' => null,
                ];
                $totalEntree += $bonapprovisionnement->getMontanttotal();
                $solde += $bonapprovisionnement->getMontanttotal();
            }

            usort($mouvements, function ($a, $b) {
                return $a['date'] <=> $b['date'];
            });
        }

        return $this->render('caisse/etat.html.twig', [
            'mouvements' => $mouvements,
            'totalEntree' => $totalEntree,
            'totalSortie' => $totalSortie,
            'solde' => $solde,
        ]);
    }


}
