<?php

namespace App\Service;

use App\Entity\Caisse;
use App\Entity\Fdb;
use App\Repository\ApproCaisseRepository;
use App\Repository\BilletageRepository;
use App\Repository\BonapprovisionnementRepository;
use App\Repository\BonCaisseRepository;
use App\Repository\CaisseRepository;
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
                                ApproCaisseRepository $approCaisseRepository,
                                CaisseRepository $caisseRepository
    )
    {
        $this->fdbRepository = $fdbRepository;
        $this->BonapprovisionnementRepository = $bonapprovisionnementRepository;
        $this->BonCaisseRepository = $bonCaisseRepository;
        $this->RecuCaisseRepository = $recuCaisseRepository;
        $this->BilletageRepository = $billetageRepository;
        $this->JournalCaisseRepository = $journalCaisseRepository;
        $this->ApproCaisseRepository = $approCaisseRepository;
        $this->CaisseRepository = $caisseRepository;
    }

    public function refFdb(): string
    {
        $lastId = (int)$this->fdbRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°FB'.$year.'';
        $id = $this->countOp($lastId);
        return $suffix.$id;

    }

    public function refCaisse(): string
    {
        // Récupère le dernier ID ou 0 si aucun ID trouvé
        $lastId = (int)($this->CaisseRepository->findLastId() ?? 0);

        // Incrémente l'ID
        $lastId++;

        // Formate l'ID en 3 chiffres avec le préfixe 'C'
        return 'C'.str_pad($lastId, 3, '0', STR_PAD_LEFT);
    }

    public function refApproCaisse(): string
    {
        $lastId = (int)$this->ApproCaisseRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°APC'.$year.'';
        $id = $this->countOp($lastId);
        return $suffix.$id;

    }

//    public function refJournalCaisse(): string
//    {
//        $lastId = (int)$this->JournalCaisseRepository->findLastId() ?? 0;
//        $lastId++;
//        $year = date_format(new \DateTime(),'Y');
//        $suffix = 'N°OSC-JC/'.$year.'/';
//        $id = $this->countOp($lastId);
//        return $suffix.$id;
//
//    }

    public function refJournalCaisse(string $caisseCode): string
    {
        // Récupère le dernier ID et incrémente de 1
        $lastId = (int)$this->JournalCaisseRepository->findLastId() ?? 0;
        $lastId++;

        // Récupération de l'année en cours
        $year = date_format(new \DateTime(), 'Y');

        // Création du suffixe avec le code de la caisse
        $suffix = 'N°J' . $caisseCode . '' . $year . '';

        // Formattage de l'identifiant avec countOp
        $id = $this->countOp($lastId);

        // Retourne la référence complète
        return $suffix . $id;
    }


    public function refBonCaisse(): string
    {
        $lastId = (int)$this->BonCaisseRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°BC'.$year.'';
        $id = $this->countOp($lastId);
        return $suffix.$id;

    }

    public function refRecuCaisse(): string
    {
        $lastId = (int)$this->RecuCaisseRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°RC'.$year.'';
        $id = $this->countOp($lastId);
        return $suffix.$id;

    }

    public function refBilletageCaisse(): string
    {
        $lastId = (int)$this->BilletageRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°BI'.$year.'';
        $id = $this->countOp($lastId);
        return $suffix.$id;

    }


    public function refBonApprovisionnement(): string
    {
        $lastId = (int)$this->BonapprovisionnementRepository->findLastId() ?? 0;
        $lastId++;
        $year = date_format(new \DateTime(),'Y');
        $suffix = 'N°BA'.$year.'';
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
