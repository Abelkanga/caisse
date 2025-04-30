<?php

namespace App\Service;

use App\Entity\Societe;
use App\Repository\SocieteRepository;

class SocieteService
{
    private SocieteRepository $societeRepository;

    private ?Societe $societe = null;

    public function __construct(SocieteRepository $societeRepository)
    {
        $this->societeRepository = $societeRepository;
        $societe = $this->societeRepository->getFirstResult();
        $this->societe = $societe;
    }

    public function __invoke(): Societe
    {
        $societe = $this->societeRepository->getFirstResult();

        return $societe;
    }

    public function __toString()
    {
        return $this->societe;;
    }
}
