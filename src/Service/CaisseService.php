<?php

namespace App\Service;

use App\Entity\Caisse;
use App\Entity\Fdb;
use App\Repository\FdbRepository;

class CaisseService
{
    private FdbRepository $fdbRepository;
    public function __construct(FdbRepository $fdbRepository)
    {
        $this->fdbRepository = $fdbRepository;
    }

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

    public function refFdb(): string
    {
        $lastId = (int)$this->fdbRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°OSC/'.$year.'/';
        $id = $this->countOp($lastId);
        return $suffix.$id;
    }

    public function countOp($val): string
    {

        switch ($val) {
            case ($val < 10):
                return "00$val";
            case ($val < 100):
                return "0$val";
            case ($val <= 100000):
                return $val;
            default:
                throw new \LogicException('Unexpected value');
        }
    }
}
