<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    //    /**
    //     * @return User[] Returns an array of User objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?User
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }


    /**
     * Retourne les utilisateurs ayant le rôle ROLE_MANAGER
     *
     * @return User[]
     */
    public function findUsersByRoleManager(): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.roles LIKE :role')
            ->setParameter('role', '%"ROLE_MANAGER"%')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find all users except those with roles ROLE_ADMIN or ROLE_SUPER_ADMIN
     *
     * @return User[] Returns an array of User objects
     */
//    public function findAllExcludingAdmins(): array
//    {
//        return $this->createQueryBuilder('u')
//            ->where('u.roles NOT LIKE :roleAdmin')
//            ->andWhere('u.roles NOT LIKE :roleSuperAdmin')
//            ->setParameter('roleAdmin', '%"ROLE_ADMIN"%')
//            ->setParameter('roleSuperAdmin', '%"ROLE_SUPER_ADMIN"%')
//            ->getQuery()
//            ->getResult();
//    }
//
//    public function findAllActiveUsers(): array
//    {
//        return $this->createQueryBuilder('u')
//            ->where('u.isActive = :active')
//            ->setParameter('active', true)
//            ->getQuery()
//            ->getResult();
//    }

    public function findAllActiveUsersExcludingAdmins(): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.isActive = :active')
            ->andWhere('u.roles NOT LIKE :roleAdmin')
            ->andWhere('u.roles NOT LIKE :roleSuperAdmin')
            ->setParameter('active', true)
            ->setParameter('roleAdmin', '%"ROLE_ADMIN"%')
            ->setParameter('roleSuperAdmin', '%"ROLE_SUPER_ADMIN"%')
            ->getQuery()
            ->getResult();
    }

    public function countByRole(string $role): int
    {
        return $this->createQueryBuilder('u')
            ->select('count(u.id)')
            ->where('u.roles LIKE :role')
            ->setParameter('role', '%' . $role . '%')
            ->getQuery()
            ->getSingleScalarResult();
    }

}
