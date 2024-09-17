<?php

namespace App\Repository;

use App\Entity\ApproCaisse;
use App\Entity\Bonapprovisionnement;
use App\Entity\Caisse;
use App\Entity\Fdb;
use App\Entity\Journee;
use App\Entity\User;
use App\Utils\Status;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\SecurityBundle\Security;

/**
 * @extends ServiceEntityRepository<Journee>
 *
 * @method Journee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Journee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Journee[]    findAll()
 * @method Journee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
// src/Repository/JourneeRepository.php

class JourneeRepository extends ServiceEntityRepository
{
    private Security $security;

    public function __construct(Security $security, ManagerRegistry $registry)
    {
        parent::__construct($registry, Journee::class);
        $this->security = $security;
    }

    // Récupère la journée active pour une caisse donnée
    public function activeJournee(): ?Journee
    {
        $caisse = $this->getCaisse();

        if ($caisse === null) {
            return null; // Retourner null si aucune caisse n'est trouvée
        }

        return $this->qB($caisse, true)
            ->orderBy('j.id', 'DESC')
            ->getQuery()
            ->getOneOrNullResult();
    }


    // Récupère la dernière journée fermée pour une caisse donnée
    public function lastJournee(Caisse $caisse): ?Journee
    {
        return $this->qB($caisse, false)
            ->orderBy('j.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
    // Récupère le solde actif pour la journée active d'une caisse donnée
    public function activeSolde(Caisse $caisse): ?Journee
    {
        return $this->qB($caisse, true)
            ->getQuery()
            ->getOneOrNullResult();
    }

    // Récupère les approvisionnements pour une journée donnée
    public function getBonApprovisionnementsForJournee(Journee $journee): array
    {
        return $this->createQueryBuilder('j')
            ->select('b')
            ->from(Bonapprovisionnement::class, 'b')
            ->where('b.journee = :journee')
            ->setParameter('journee', $journee)
            ->getQuery()
            ->getResult();
    }

    // Récupère les dépenses pour une journée donnée
    public function getFdbForJournee(Journee $journee): array
    {
        return $this->createQueryBuilder('j')
            ->select('f')
            ->from(Fdb::class, 'f')
            ->where('f.journee = :journee')
            ->setParameter('journee', $journee)
            ->getQuery()
            ->getResult();
    }

    // Récupère les approvisionnements caisse à caisse pour une journée donnée
    public function getApproCaisseForJournee(Journee $journee): array
    {
        return $this->createQueryBuilder('j')
            ->select('ap')
            ->from(ApproCaisse::class, 'ap')
            ->where('ap.journee = :journee')
            ->setParameter('journee', $journee)
            ->getQuery()
            ->getResult();
    }

    public function findActiveJourneeByCaisse(Caisse $caisse): ?Journee
    {
        return $this->createQueryBuilder('j')
            ->where('j.caisse = :caisse')
            ->andWhere('j.active = true')
            ->setParameter('caisse', $caisse)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function bilanLatestJournee(): ?array
    {
        return $this->createQueryBuilder('j')
            ->select([
                '(SUM(f.total) - SUM(b.montanttotal)) as solde_total',
                'j.startedAt as date_journee',
                'j.closedAt',
                'SUM(f.total) as fdb_total',
                'SUM(b.montanttotal) as bonapprovisionnement_total',
                'j.active',
                'j.lastSolde',
            ])
            ->leftJoin('j.fdbs', 'f')
            ->leftJoin('j.bonapprovisionnements', 'b')
            ->where('j.active = false')
            ->orderBy('j.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getScalarResult();
    }

    private function qB(Caisse $caisse, bool $isActive): \Doctrine\ORM\QueryBuilder
    {
        return $this->createQueryBuilder('j')
            ->where('j.caisse = :caisse')
            ->andWhere('j.active = :active')
            ->setParameter('caisse', $caisse)
            ->setParameter('active', $isActive);
    }
    
    private function getCaisse(): ?Caisse
    {
        /** @var User $user */
        $user = $this->security->getUser();
        return $user->getCaisse();
    }

}
