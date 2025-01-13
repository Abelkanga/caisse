<?php

namespace App\Repository;

use App\Entity\OrderMission;
use App\Entity\User;
use App\Utils\Status;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrderMission>
 */
class OrderMissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderMission::class);
    }

    //    /**
    //     * @return OrderMission[] Returns an array of OrderMission objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?OrderMission
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }


    public function findByUserRole(User $user): array
    {
        $roles = $user->getRoles();
        $qb = $this->createQueryBuilder('o')
            ->andWhere('o.isActive = :isActive')
            ->setParameter('isActive', true);

        // Si l'utilisateur a le rôle ROLE_MANAGER, on affiche toutes ses fiches, même les brouillons
        if (in_array('ROLE_MANAGER', $roles)) {
            $qb->andWhere('o.user = :user')
                ->setParameter('user', $user);
        } elseif (in_array('ROLE_MANAGER1', $roles)) {
            // Exclure les brouillons pour ROLE_RESPONSABLE et ROLE_MANAGER1
            $qb->andWhere('o.status != :status')
                ->setParameter('status', Status::BROUILLON);
        } elseif (in_array('ROLE_USER', $roles) || in_array('ROLE_RESPONSABLE', $roles) || in_array('ROLE_IMPRESSION', $roles)) {
            // Filtrer uniquement les fiches créées par l'utilisateur pour ROLE_USER et ROLE_IMPRESSION
            $qb->andWhere('o.user = :user')
                ->setParameter('user', $user);
        }

        return $qb->orderBy('o.date', 'DESC')
            ->getQuery()
            ->getResult();
    }


    public function findPendingByUserRole(User $user): array
    {
        $qb = $this->createQueryBuilder('o')
            ->andWhere('o.status = :status')
            ->setParameter('status', Status::EN_ATTENTE);

        if (in_array('ROLE_USER', $user->getRoles())) {
            $qb->andWhere('o.user = :user')
                ->setParameter('user', $user);
        }

        return $qb->orderBy('o.date', 'DESC')
            ->getQuery()
            ->getResult();
    }


    public function findFicheByStatus(string $status = Status::EN_ATTENTE)
    {
        return $this->createQueryBuilder('o')
            ->where('o.status = :status')
            ->setParameter('status', $status)
            ->orderBy('o.date', 'DESC')
            ->getQuery()
            ->getResult();
    }


    public function findFdbCancelByUserRole(User $user): array
    {
        $qb = $this->createQueryBuilder('o')
            ->andWhere('o.status = :status')
            ->andWhere('o.isActive = :isActive') // Vérifier que la fiche est active
            ->setParameter('status', Status::CANCELLED)
            ->setParameter('isActive', true);

        if (in_array('ROLE_USER', $user->getRoles())) {
            $qb->andWhere('o.user = :user')
                ->setParameter('user', $user);
        }

        return $qb->orderBy('o.date', 'DESC')
            ->getQuery()
            ->getResult();
    }


    public function findFdbApprouveByUserRole(User $user): array
    {
        $qb = $this->createQueryBuilder('o')
            ->andWhere('o.status = :status')
            ->setParameter('status', Status::CONVERT);

        if (in_array('ROLE_USER', $user->getRoles())) {
            $qb->andWhere('o.user = :user')
                ->setParameter('user', $user);
        }

        return $qb->orderBy('o.date', 'DESC')
            ->getQuery()
            ->getResult();
    }


    public function findFdbApprouvedByUserRoleAndCaisse(User $user): array
    {
        $qb = $this->createQueryBuilder('o')
            ->andWhere('o.status = :status')
            ->setParameter('status', Status::APPROUVED);

        // Si l'utilisateur a le rôle 'ROLE_USER', on filtre par l'utilisateur
        if (in_array('ROLE_USER', $user->getRoles())) {
            $qb->andWhere('o.user = :user')
                ->setParameter('user', $user);
        } else {
            // Sinon, on filtre par la caisse associée à l'utilisateur
            $caisse = $user->getCaisse();

            if ($caisse) {
                $qb->andWhere('o.caisse = :caisse')
                    ->setParameter('caisse', $caisse);
            }
        }

        return $qb->orderBy('o.date', 'DESC')
            ->getQuery()
            ->getResult();
    }


    public function findValidatedByRoleUser()
    {
        return $this->createQueryBuilder('o')
            ->join('o.user', 'u') // Jointure avec la table utilisateur
            ->where('o.status = :status')
            ->andWhere('u.roles LIKE :role') // Vérification du rôle ROLE_USER
            ->setParameter('status', Status::VALIDATED)
            ->setParameter('role', '%"ROLE_USER"%') // Recherche du rôle au format JSON
            ->orderBy('o.date', 'DESC') // Tri par date décroissante
            ->getQuery()
            ->getResult();
    }



    public function findLastId()
    {
        return $this->createQueryBuilder('om')
            ->select('MAX(om.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
