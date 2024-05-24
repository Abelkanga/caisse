<?php

namespace App\Service;

use App\Entity\Caisse;
use App\Entity\Fdb;
use App\Repository\DepenseRepository;
use App\Repository\FdbRepository;

class CaisseService
{
    private FdbRepository $fdbRepository;
    public function __construct(FdbRepository $fdbRepository)
    {
        $this->fdbRepository = $fdbRepository;
    }


    private DepenseRepository $depenseRepository;

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
