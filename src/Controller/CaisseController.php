<?php

namespace App\Controller;

use App\Entity\Caisse;
use App\Form\CaisseType;
use App\Repository\CaisseRepository;
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
            flash()->success('Caisse créée avec succès !');
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
            flash()->success('Caisse modifiée avec succès !');
            return  $this->redirectToRoute('caisse_index');
        }
        return $this->render('caisse/edit.html.twig', [
            'form' => $form ,
        ]);
    }

    #[Route('/etat', name: 'app_etat_caisse', methods: ['GET'])]
    public function etatCaisse(Request $request, CaisseRepository $caisseRepository): Response
    {
        $dateDebut = $request->query->get('dateDebut');
        $dateFin = $request->query->get('dateFin');
        $type = $request->query->get('type');

        $queryBuilder = $caisseRepository->createQueryBuilder('c')
            ->leftJoin('c.fdbs', 'f')
            ->leftJoin('c.depenses', 'd')
            ->leftJoin('c.bonapprovisionnements', 'b')

            ->addSelect( 'f', 'd', 'b');

        if ($dateDebut) {
            $queryBuilder->andWhere('f.date >= :dateDebut OR d.date >= :dateDebut OR b.date >= :dateDebut')
                ->setParameter('dateDebut', $dateDebut);
        }

        if ($dateFin) {
            $queryBuilder->andWhere('f.date <= :dateFin OR d.date <= :dateFin OR b.date <= :dateFin')
                ->setParameter('dateFin', $dateFin);
        }

        if ($type) {
            if ($type === 'entree') {
                $queryBuilder->andWhere('b.id IS NOT NULL');
            } elseif ($type === 'sortie') {
                $queryBuilder->andWhere('f.id IS NOT NULL');
                $queryBuilder->andWhere('d.id IS NOT NULL');
            }
        }

        $caisse = $queryBuilder->getQuery()->getResult();

        $data = [];
        foreach ($caisse as $caisse) {
            foreach ($caisse->getDepenses() as $depense) {
                $data[] = [
                    'type' => 'sortie',
                    'date' => $depense->getDate()->format('Y-m-d'),
                    'montant' => $depense->getMontant(),
                    'intitule' => $caisse->getIntitule(),
                ];
            }
            foreach ($caisse->getBonApprovisionnements() as $bon) {
                $data[] = [
                    'type' => 'entree',
                    'date' => $bon->getDate()->format('Y-m-d'),
                    'montant' => $bon->getMontant(),
                    'intitule' => $caisse->getIntitule(),
                ];
            }
        }

        return $this->render('caisse/etat.html.twig', [
            'caisse' => $data,
//            'solde' => $caisse ? $caisse[0]->calculateSolde() : 0,
        ]);
    }


//    #[Route('/liste/etat', name: 'app_list_etat', methods: ['GET'])]
//    public function allFactureInfo(FactureRepository $factureRepository): Response
//    {
//        // Obtenir toutes les factures avec les détails et les clients associés
//        $factures = $factureRepository->createQueryBuilder('f')
//            ->leftJoin('f.IdClient', 'c')
//            ->leftJoin('f.detailFactures', 'df')
//            ->leftJoin('df.produit', 'p')
//            ->addSelect('c', 'df', 'p')
//            ->getQuery()
//            ->getResult();
//
//        // Préparer les données pour la vue
//        $data = [];
//        foreach ($factures as $facture) {
//            foreach ($facture->getDetailFactures() as $detail) {
//                $data[] = [
//                    'idFacture' => $facture->getId(),
//                    'clientNom' => $facture->getIdClient()->getNom(),
//                    'clientPrenom' => $facture->getIdClient()->getPrenom(),
//                    'codeFacture' => $facture->getCodeFacture(),
//                    'dateFacture' => $facture->getDate()->format('Y-m-d'),
//                    'produit' => $detail->getProduit()->getLibelle(),
//                    'quantite' => $detail->getQuantite(),
//                    'prix' => $detail->getPrix(),
//                    'montantTTC' => $detail->getMontantTTC(),
//                    'montantHT' => $detail->getMontantHT(),
//                    'montantTVA' => $detail->getMontantTVA(),
//                    'remise' => $detail->getRemise(),
//                ];
//            }
//        }
//
//        return $this->render('etat/index.html.twig', [
//            'factures' => $data,
//        ]);
//    }
//}
}
