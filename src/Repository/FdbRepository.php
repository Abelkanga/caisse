<?php

namespace App\Repository;

use App\Entity\Caisse;
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

//    public function findByUserRole(User $user): array
//    {
//        $roles = $user->getRoles();
//        $qb = $this->createQueryBuilder('f')
//            ->andWhere('f.isActive = :isActive')
//            ->setParameter('isActive', true);
//
//        // Exclure les brouillons pour ROLE_RESPONSABLE, ROLE_MANAGER et ROLE_MANAGER1
//        if (in_array('ROLE_RESPONSABLE', $roles) || in_array('ROLE_MANAGER', $roles) || in_array('ROLE_MANAGER1', $roles)) {
//            $qb->andWhere('f.status != :status')
//                ->setParameter('status', Status::BROUILLON);
//        }
//
//        if (in_array('ROLE_USER', $roles) || in_array('ROLE_IMPRESSION', $roles)) {
//            $qb->andWhere('f.user = :user')
//                ->setParameter('user', $user);
//        }
//
//        return $qb->orderBy('f.date', 'DESC')
//            ->getQuery()
//            ->getResult();
//    }

    public function findByUserRole(User $user): array
    {
        $roles = $user->getRoles();
        $qb = $this->createQueryBuilder('f')
            ->andWhere('f.isActive = :isActive')
            ->setParameter('isActive', true);

        // Si l'utilisateur a le rôle ROLE_MANAGER, on affiche toutes ses fiches, même les brouillons
        if (in_array('ROLE_MANAGER', $roles)) {
            $qb->andWhere('f.user = :user')
                ->setParameter('user', $user);
//        } elseif (in_array('ROLE_MANAGER1', $roles) || in_array('ROLE_IMPRESSION', $roles)) {
//            // Exclure les brouillons pour ROLE_RESPONSABLE et ROLE_MANAGER1
//            $qb->andWhere('f.status != :status')
//                ->setParameter('status', Status::BROUILLON);
//        } elseif (in_array('ROLE_USER', $roles) || in_array('ROLE_RESPONSABLE', $roles)
////            || in_array('ROLE_IMPRESSION', $roles)
//        ) {
            // Filtrer uniquement les fiches créées par l'utilisateur pour ROLE_USER et ROLE_IMPRESSION
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

//    public function findFdbApprouvedByUserRole(User $user): array
//    {
//        $qb = $this->createQueryBuilder('f')
//            ->andWhere('f.status = :status')
//            ->setParameter('status', Status::APPROUVED);
//
//        if (in_array('ROLE_USER', $user->getRoles())) {
//            $qb->andWhere('f.user = :user')
//                ->setParameter('user', $user);
//        }
//
//        return $qb->orderBy('f.date', 'DESC')
//            ->getQuery()
//            ->getResult();
//    }
//
//    public function findFdbApprouvedByCaisse(Caisse $caisse)
//    {
//        return $this->createQueryBuilder('f')
//            ->where('f.status = :status')
//            ->andWhere('f.caisse = :caisse')
//            ->setParameter('status', 'approuvé')  // Assurez-vous que le statut correspond bien à 'approuvé'
//            ->setParameter('caisse', $caisse)
//            ->getQuery()
//            ->getResult();
//    }

//    public function findFdbApprouvedByUserRoleAndCaisse(User $user): array
//    {
//        $qb = $this->createQueryBuilder('f')
//            ->andWhere('f.status = :status')
//            ->setParameter('status', Status::APPROUVED);
//
//        // Si l'utilisateur a le rôle 'ROLE_USER', on filtre par l'utilisateur
//        if (in_array('ROLE_USER', $user->getRoles())) {
//            $qb->andWhere('f.user = :user')
//                ->setParameter('user', $user);
//        } else {
//            // Sinon, on filtre par la caisse associée à l'utilisateur
//            $caisse = $user->getCaisse();
//
//            if ($caisse) {
//                $qb->andWhere('f.caisse = :caisse')
//                    ->setParameter('caisse', $caisse);
//            }
//        }
//
//        return $qb->orderBy('f.date', 'DESC')
//            ->getQuery()
//            ->getResult();
//    }

//    public function findFdbApprouvedByUserRoleAndCaisse(User $user): array
//    {
//        $qb = $this->createQueryBuilder('f')
//            ->andWhere('f.status = :status')
//            ->setParameter('status', Status::APPROUVED);
//
//        $roles = $user->getRoles();
//
//        if (in_array('ROLE_USER', $roles)) {
//            // Si l'utilisateur a le rôle 'ROLE_USER', on filtre par utilisateur
//            $qb->andWhere('f.user = :user')
//                ->setParameter('user', $user);
//        } elseif (in_array('ROLE_MANAGER1', $roles)) {
//            // Si l'utilisateur a le rôle 'ROLE_MANAGER1', on récupère toutes les fiches approuvées
//            // Aucune condition supplémentaire
//        } else {
//            // Sinon, on filtre par la caisse associée à l'utilisateur
//            $caisse = $user->getCaisse();
//
//            if ($caisse) {
//                $qb->andWhere('f.caisse = :caisse')
//                    ->setParameter('caisse', $caisse);
//            }
//        }
//
//        return $qb->orderBy('f.date', 'DESC')
//            ->getQuery()
//            ->getResult();
//    }


    public function findFdbApprouvedByRoleManager1(User $user): array
    {
        $qb = $this->createQueryBuilder('f')
            ->andWhere('f.status = :status') // Filtrer les fiches approuvées
            ->setParameter('status', Status::APPROUVED);

        // Vérifier si l'utilisateur a le rôle ROLE_MANAGER1
        $roles = $user->getRoles();
        if (in_array('ROLE_MANAGER1', $roles)) {
            // Aucune restriction supplémentaire pour ROLE_MANAGER1 : toutes les fiches approuvées, converties ou non
            $qb->andWhere('f.isConverted = true OR f.isConverted = false');
        }

        // Tri par date décroissante
        return $qb->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findFdbApprouvedNotConvertedByRoleManager(User $user): array
    {
        $qb = $this->createQueryBuilder('f')
            ->andWhere('f.status = :status') // Filtrer les fiches approuvées
            ->setParameter('status', Status::APPROUVED);

        // Vérifier si l'utilisateur a le rôle ROLE_MANAGER
        $roles = $user->getRoles();
        if (in_array('ROLE_MANAGER', $roles)) {
            // Ajouter une condition pour ROLE_MANAGER : uniquement les fiches non converties
            $qb->andWhere('f.isConverted = false');
        } else {
            // Si l'utilisateur n'a pas le rôle ROLE_MANAGER, on retourne une liste vide
            return [];
        }

        // Trier par date décroissante
        return $qb->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }


//    public function findFdbApprouvedNotConvertedForRoleManager(User $user): array
//    {
//        $qb = $this->createQueryBuilder('f')
//            ->andWhere('f.status = :status') // Fiches approuvées uniquement
//            ->setParameter('status', Status::APPROUVED)
//            ->andWhere('f.isConverted = false'); // Fiches non converties uniquement
//
//        // Filtrer par caisse associée à l'utilisateur
//        $caisse = $user->getCaisse();
//        if ($caisse) {
//            $qb->andWhere('f.caisse = :caisse')
//                ->setParameter('caisse', $caisse);
//        }
//
//        return $qb->orderBy('f.date', 'DESC') // Trier par date décroissante
//        ->getQuery()
//            ->getResult();
//    }

    public function findFdbApprouvedNotConvertedForRoleManager(User $user): array
    {
        $qb = $this->createQueryBuilder('f')
            ->andWhere('f.status = :status') // Filtrer les fiches approuvées
            ->setParameter('status', Status::APPROUVED)
            ->andWhere('f.isConverted = false'); // Filtrer les fiches non converties

        // Vérifier si l'utilisateur a le rôle ROLE_MANAGER
        $roles = $user->getRoles();
        if (in_array('ROLE_MANAGER', $roles)) {
            // Ajouter une condition spécifique si ROLE_MANAGER a des restrictions supplémentaires
            $caisse = $user->getCaisse();
            if ($caisse) {
                $qb->andWhere('f.caisse = :caisse') // Filtrer par la caisse associée
                ->setParameter('caisse', $caisse);
            }
        } else {
            // Si l'utilisateur n'a pas le rôle ROLE_MANAGER, on retourne une liste vide
            return [];
        }

        // Trier par date décroissante
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

    public function findFicheByStatus(string $status = Status::EN_ATTENTE)
    {
        return $this->createQueryBuilder('f')
            ->where('f.status = :status')
            ->setParameter('status', $status)
            ->orderBy('f.date', 'DESC')
            ->getQuery()
            ->getResult();
    }


    public function findValidatedByRoleUser()
    {
        return $this->createQueryBuilder('f')
            ->join('f.user', 'u') // Jointure avec la table utilisateur
            ->where('f.status = :status')
            ->andWhere('u.roles LIKE :role') // Vérification du rôle ROLE_USER
            ->setParameter('status', Status::VALIDATED)
            ->setParameter('role', '%"ROLE_USER"%') // Recherche du rôle au format JSON
            ->orderBy('f.date', 'DESC') // Tri par date décroissante
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