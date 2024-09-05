<?php

namespace App\Repository;

use App\Entity\JournalCaisse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JournalCaisse>
 */
class JournalCaisseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JournalCaisse::class);
    }

    //    /**
    //     * @return JournalCaisse[] Returns an array of JournalCaisse objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('j')
    //            ->andWhere('j.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('j.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?JournalCaisse
    //    {
    //        return $this->createQueryBuilder('j')
    //            ->andWhere('j.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findLastId()
    {
        return $this->createQueryBuilder('jc')
            ->select('MAX(jc.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findReportingJournal(mixed $dateDebut,mixed $dateFin)
    {
        $qb = $this->createQueryBuilder('jc');
        $qb
            ->join('jc.caisse','caisse')
            ->where($qb->expr()->between('jc.date','?1','?2'))
            ->setParameter('1' , $dateDebut)
            ->setParameter('2', $dateFin)
        ;
        return $qb->getQuery()->getResult();
    }

    public function getLastSolde(int $caisseId)
    {
        return $this->createQueryBuilder('jc')
                    ->select('jc.solde')
                    ->where('jc.caisse = :caisse')
                    ->setParameter('caisse',$caisseId)
                    ->orderBy('jc.id','DESC')
                    ->setMaxResults(1)
                    ->getQuery()->getSingleScalarResult();
    }

//    public function getLastSolde(int $caisseId)
//    {
//        return $this->createQueryBuilder('jc')
//            ->select('jc.solde')
//            ->where('jc.caisse = :caisseId')  // Condition correcte
//            ->setParameter('caisseId', $caisseId)  // Liaison du paramètre
//            ->orderBy('jc.id', 'DESC')  // Dernier solde (donc ordre DESC)
//            ->setMaxResults(1)  // Limiter le résultat à 1
//            ->getQuery()
//            ->getSingleScalarResult();
//    }


}
