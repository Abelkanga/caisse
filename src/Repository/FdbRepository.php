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

    /**
     * Trouve les fiches de besoin (Fdb) en fonction du rôle de l'utilisateur
     */
    // src/Repository/FdbRepository.php

    public function findByUserRole(User $user): array
    {
        $roles = $user->getRoles();
        $qb = $this->createQueryBuilder('f')
            ->andWhere('f.isActive = :isActive')
            ->setParameter('isActive', true);

        // Exclure les brouillons pour ROLE_RESPONSABLE, ROLE_MANAGER et ROLE_MANAGER1
        if (in_array('ROLE_RESPONSABLE', $roles) || in_array('ROLE_MANAGER', $roles) || in_array('ROLE_MANAGER1', $roles)) {
            $qb->andWhere('f.status != :status')
                ->setParameter('status', Status::BROUILLON);
        }

        if (in_array('ROLE_USER', $roles) || in_array('ROLE_IMPRESSION', $roles)) {
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

    public function findFdbCancelByUserRole(User $user): array
    {
        $qb = $this->createQueryBuilder('f')
            ->andWhere('f.status = :status')
            ->andWhere('f.isActive = :isActive') // Vérifier que la fiche est active
            ->setParameter('status', Status::CANCELLED)
            ->setParameter('isActive', true);

        if (in_array('ROLE_USER', $user->getRoles())) {
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
            ->setParameter('status', Status::CONVERT);

        if (in_array('ROLE_USER', $user->getRoles())) {
            $qb->andWhere('f.user = :user')
                ->setParameter('user', $user);
        }

        return $qb->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findFdbApprouvedByUserRole(User $user): array
    {
        $qb = $this->createQueryBuilder('f')
            ->andWhere('f.status = :status')
            ->setParameter('status', Status::APPROUVED);

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

    public function findFdbBrouillon(): array
    {
        return $this->createQueryBuilder('f')
            ->where('f.status = :status')
            ->setParameter('status', Status::BROUILLON )
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
            ->setParameter('status', Status::CONVERT)
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
