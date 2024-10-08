<?php

namespace App\Repository;

use App\Entity\Billetage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Billetage>
 *
 * @method Billetage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Billetage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Billetage[]    findAll()
 * @method Billetage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class BilletageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Billetage::class);
    }

    public function save(Billetage $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Billetage $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Billetage[] Returns an array of Billetage objects
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


//    public function findOneBySomeField($value): ?Billetage
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
        return $this->createQueryBuilder('bi')
            ->select('MAX(bi.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

}
