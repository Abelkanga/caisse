<?php

namespace App\Repository;

use App\Entity\BonMission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BonMission>
 */
class BonMissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BonMission::class);
    }

    //    /**
    //     * @return BonMission[] Returns an array of BonMission objects
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

    //    public function findOneBySomeField($value): ?BonMission
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findLastId()
    {
        return $this->createQueryBuilder('bm')
            ->select('MAX(bm.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }



    /**
     * Retourne les bons de mission convertis.
     *
     * @return BonMission[]
     */
    public function findConverted(): array
    {
        return $this->createQueryBuilder('bm')
            ->andWhere('bm.status = :status')
            ->setParameter('status', 'convertit') // Remplacez par la valeur réelle du statut "converti"
            ->orderBy('bm.date', 'DESC') // Tri par date décroissante, ajustez selon vos besoins
            ->getQuery()
            ->getResult();
    }
}
