<?php

namespace App\Repository;

use App\Entity\Journee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class JourneeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Journee::class);
    }

    public function findActiveJournee(): ?Journee
    {
        return $this->findOneBy(['active' => true]);
    }
}
