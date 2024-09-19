<?php

namespace App\Repository;

use App\Entity\ApproCaisse;
use App\Entity\Caisse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ApproCaisse>
 */
class ApproCaisseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApproCaisse::class);
    }

//    /**
//     * @return ApproCaisse[] Returns an array of ApproCaisse objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ApproCaisse
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findLastId()
    {
        return $this->createQueryBuilder('ap')
            ->select('MAX(ap.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findByCaisseEmettrice(Caisse $caisse)
    {
        return $this->createQueryBuilder('a')
            ->where('a.caisseEmettrice = :caisse')
            ->setParameter('caisse', $caisse)
            ->getQuery()
            ->getResult();
    }

    public function findByCaisseReceptrice(Caisse $caisse)
    {
        return $this->createQueryBuilder('a')
            ->where('a.caisseReceptrice = :caisse')
            ->setParameter('caisse', $caisse)
            ->orderBy('a.date', 'DESC')
            ->getQuery()
            ->getResult();
    }


}
