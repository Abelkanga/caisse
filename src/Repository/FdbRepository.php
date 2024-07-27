<?php

namespace App\Repository;

use App\Entity\Fdb;
use App\Entity\User;
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


    /**
     * Trouve les fiches de besoin (Fdb) en fonction du rôle de l'utilisateur
     */
    public function findByUserRole(User $user): array
    {
        $qb = $this->createQueryBuilder('f')
            ->andWhere('f.isActive = :isActive') // Ne retourner que les fiches actives
            ->setParameter('isActive', true);

        if (in_array('ROLE_USER', $user->getRoles())) {
            $qb->andWhere('f.user = :user')
                ->setParameter('user', $user);
        }

        return $qb->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findPendingByUserRole(User $user): array
    {
        $qb = $this->createQueryBuilder('f')
            ->andWhere('f.status = :status')
            ->setParameter('status', Status::EN_ATTENTE);

        if (in_array('ROLE_USER', $user->getRoles())) {
            $qb->andWhere('f.user = :user')
                ->setParameter('user', $user);
        }

        return $qb->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

// src/Repository/FdbRepository.php

    public function findFdbCancelByUserRole(User $user): array
    {
        $qb = $this->createQueryBuilder('f')
            ->andWhere('f.status = :status')
            ->andWhere('f.isActive = :isActive') // Vérifier que la fiche est active
            ->setParameter('status', Status::CANCELLED)
            ->setParameter('isActive', true);

        if (in_array('ROLE_SAISIE', $user->getRoles())) {
            $qb->andWhere('f.user = :user')
                ->setParameter('user', $user);
        }

        return $qb->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }


    public function findFdbValidateByUserRole(User $user): array
    {
        $qb = $this->createQueryBuilder('f')
            ->andWhere('f.status = :status')
            ->setParameter('status', Status::VALIDATED);

        if (in_array('ROLE_USER', $user->getRoles())) {
            $qb->andWhere('f.user = :user')
                ->setParameter('user', $user);
        }

        return $qb->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findFdbApprouveByUserRole(User $user): array
    {
        $qb = $this->createQueryBuilder('f')
            ->andWhere('f.status = :status')
            ->setParameter('status', Status::APPROUVE);

        if (in_array('ROLE_USER', $user->getRoles())) {
            $qb->andWhere('f.user = :user')
                ->setParameter('user', $user);
        }

        return $qb->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findFdbPending(): array
    {
        return $this->createQueryBuilder('f')
            ->where('f.status = :status')
            ->setParameter('status', Status::EN_ATTENTE)
            ->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findFdbCancel(): array
    {
        return $this->createQueryBuilder('f')
            ->where('f.status = :status')
            ->setParameter('status', Status::CANCELLED)
            ->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findFdbValidate(): array
    {
        return $this->createQueryBuilder('f')
            ->where('f.status = :status')
            ->setParameter('status', Status::VALIDATED)
            ->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findFdbApprouve(): array
    {
        return $this->createQueryBuilder('f')
            ->where('f.status = :status')
            ->setParameter('status', Status::APPROUVE)
            ->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findLastId()
    {
        return $this->createQueryBuilder('f')
            ->select('MAX(f.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @return Fdb[] Returns an array of active Fdb objects
     */
    public function findActive(): array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.isActive = :val')
            ->setParameter('val', true)
            ->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
