<?php

namespace App\Service;

use App\Entity\Caisse;
use App\Entity\Fdb;
use App\Repository\ApproCaisseRepository;
use App\Repository\BilletageRepository;
use App\Repository\BonapprovisionnementRepository;
use App\Repository\BonCaisseRepository;
use App\Repository\DepenseRepository;
use App\Repository\FdbRepository;
use App\Repository\JournalCaisseRepository;
use App\Repository\RecuCaisseRepository;

class CaisseService
{
    private FdbRepository $fdbRepository;
    public function __construct(JournalCaisseRepository $journalCaisseRepository,
                                FdbRepository $fdbRepository,
                                BonapprovisionnementRepository $bonapprovisionnementRepository,
                                BonCaisseRepository $bonCaisseRepository,
                                RecuCaisseRepository $recuCaisseRepository,
                                BilletageRepository $billetageRepository,
                                ApproCaisseRepository $approCaisseRepository
    )
    {
        $this->fdbRepository = $fdbRepository;
        $this->BonapprovisionnementRepository = $bonapprovisionnementRepository;
        $this->BonCaisseRepository = $bonCaisseRepository;
        $this->RecuCaisseRepository = $recuCaisseRepository;
        $this->BilletageRepository = $billetageRepository;
        $this->JournalCaisseRepository = $journalCaisseRepository;
        $this->ApproCaisseRepository = $approCaisseRepository;
    }

    public function refFdb(): string
    {
        $lastId = (int)$this->fdbRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°OSC-FB/'.$year.'/';
        $id = $this->countOp($lastId);
        return $suffix.$id;

    }

    public function refApproCaisse(): string
    {
        $lastId = (int)$this->ApproCaisseRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°OSC-APC/'.$year.'/';
        $id = $this->countOp($lastId);
        return $suffix.$id;

    }

    public function refJournalCaisse(): string
    {
        $lastId = (int)$this->JournalCaisseRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°OSC-JC/'.$year.'/';
        $id = $this->countOp($lastId);
        return $suffix.$id;

    }


    public function refBonCaisse(): string
    {
        $lastId = (int)$this->BonCaisseRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°OSC-BC/'.$year.'/';
        $id = $this->countOp($lastId);
        return $suffix.$id;

    }

    public function refRecuCaisse(): string
    {
        $lastId = (int)$this->RecuCaisseRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°OSC-RC/'.$year.'/';
        $id = $this->countOp($lastId);
        return $suffix.$id;

    }

    public function refBilletageCaisse(): string
    {
        $lastId = (int)$this->BilletageRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°OSC-BI/'.$year.'/';
        $id = $this->countOp($lastId);
        return $suffix.$id;

    }


    public function refBonApprovisionnement(): string
    {
        $lastId = (int)$this->BonapprovisionnementRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°OSC-BA/'.$year.'/';
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
