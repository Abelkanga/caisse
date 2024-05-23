<?php

namespace App\Repository;

use App\Entity\Fdb;
use App\Utils\Status;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fdb>
 */
class FdbRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fdb::class);
    }

    //    /**
    //     * @return Fdb[] Returns an array of Fdb objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Fdb
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findFdbPending()
    {
        $qb = $this->createQueryBuilder('f');
        $qb->where('f.status = :status')
            ->setParameter('status',Status::EN_ATTENTE);
        return $qb->getQuery()->getResult();
    }

    public function findFdbValidate()
    {
        $qb = $this->createQueryBuilder('f');
        $qb->where('f.status = :status')
            ->setParameter('status',Status::VALIDATED);
        return $qb->getQuery()->getResult();
    }

    public function findLastId()
    {
        return $this->createQueryBuilder('f')->select('f.id')
                    ->orderBy('f.id','DESC')
                    ->setMaxResults(1)->getQuery()->getOneOrNullResult();
    }
}
