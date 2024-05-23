<?php

namespace App\Repository;

use App\Entity\Bonapprovisionnement;
use App\Utils\Status;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bonapprovisionnement>
 */
class BonapprovisionnementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bonapprovisionnement::class);
    }

    //    /**
    //     * @return Bonapprovisionnement[] Returns an array of Bonapprovisionnement objects
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

    //    public function findOneBySomeField($value): ?Bonapprovisionnement
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findBonPending()
    {
        $qb = $this->createQueryBuilder('b');
        $qb->where('b.status = :status')
            ->setParameter('status',Status::EN_ATTENTE);
        return $qb->getQuery()->getResult();
    }

}
