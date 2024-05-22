<?php

namespace App\Service;

use App\Entity\Caisse;

class CaisseService
{
    public function calculerSolde(Caisse $caisse): float
    {
        $totalEntrees = 0;
        foreach ($caisse->getBonapprovisionnements() as $bonapprovisionnement) {
            $totalEntrees += $bonapprovisionnement->getMontanttotal();
        }

        $totalSorties = 0;
        foreach ($caisse->getDepenses() as $depense) {
            $totalSorties += $depense->getMontant();
        }

        return $totalEntrees - $totalSorties;
    }

    public function obtenirMouvements(Caisse $caisse): array
    {
        return [
            'depense' => $caisse->getDepenses(),
            'bonapprovisionnement' => $caisse->getBonapprovisionnements(),
        ];
    }
}
