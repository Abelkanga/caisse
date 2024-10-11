<?php

namespace App\Repository;

use App\Entity\Notification;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\SecurityBundle\Security;

/**
 * @extends ServiceEntityRepository<Notification>
 *
 * @method Notification|null find($id, $lockMode = null, $lockVersion = null)
 * @method Notification|null findOneBy(array $criteria, array $orderBy = null)
 * @method Notification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private readonly Security $security)
    {
        parent::__construct($registry, Notification::class);
    }

    public function save(Notification $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Notification $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Notification[]
     */
    public function findAll(): array
    {
        /** @var User $user */
        $user = $this->security->getUser();
        $permissions = $user?->getRoles();
        $qb = $this->createQueryBuilder('n');
        return $qb
            ->where('n.owner <>:user')
//            ->orWhere($qb->expr()->isNull('n.owner'))
            ->andwhere($qb->expr()->isNull('n.user'))
            ->orWhere('n.user =:user')
//            ->andWhere($qb->expr()->in('n.permission', $permissions))
            ->andWhere($qb->expr()->in('n.permission', $user->getRoles()))
            ->andWhere('n.unread = true')
            ->setParameter('user', $user)
            ->getQuery()->getResult();
    }
}