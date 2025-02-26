<?php

namespace App\Repository;

use App\Entity\BackCash;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BackCash>
 */
class BackCashRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BackCash::class);
    }

    //    /**
    //     * @return BackCash[] Returns an array of BackCash objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?BackCash
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    // src/Repository/BackCashRepository.php
    public function getTotalRetourne(string $reference, string $typeDepense): float
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.reference = :reference')
            ->andWhere('b.typeDepense = :typeDepense')
            ->setParameter('reference', $reference)
            ->setParameter('typeDepense', $typeDepense)
            ->select('SUM(b.montantRetour) as total')
            ->getQuery()
            ->getSingleScalarResult() ?? 0;
    }

    public function findLastId()
    {
        return $this->createQueryBuilder('rf')
            ->select('MAX(rf.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
