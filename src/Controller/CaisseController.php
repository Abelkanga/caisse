<?php

namespace App\Controller;

use App\Entity\Caisse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/caisse')]
class CaisseController extends AbstractController
{
    #[Route('/solde/{id}', name: 'caisse_solde')]
    public function consulterSolde(Caisse $caisse): Response
    {
        // Calculer le solde disponible
        $totalEntrees = 0;
        foreach ($caisse->getBonapprovisionnements() as $bonapprovisionnement) {
            $totalEntrees += $bonapprovisionnement->getMontanttotal();
        }

        $totalSorties = 0;
        foreach ($caisse->getDepenses() as $depense) {
            $totalSorties += $depense->getMontant();
        }

        $soldedispo = $totalEntrees - $totalSorties;

        return $this->render('caisse/solde.html.twig', [
            'caisse' => $caisse,
            'soldeDisponible' => $soldedispo,
        ]);
    }

    #[Route('/mouvements/{id}', name: 'caisse_mouvements')]
    public function consulterMouvements(Caisse $caisse): Response
    {
        $depense = $caisse->getDepenses();
        $bonapprovisionnement = $caisse->getBonapprovisionnements();

        return $this->render('caisse/mouvements.html.twig', [
            'caisse' => $caisse,
            'depense' => $depense,
            'bonapprovisionnement' => $bonapprovisionnement,
        ]);
    }


}
