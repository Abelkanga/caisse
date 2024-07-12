<?php

namespace App\Service;

use App\Entity\Journee;
use App\Repository\JourneeRepository;
use Doctrine\ORM\EntityManagerInterface;

class JourneeService
{
    private JourneeRepository $journeeRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(JourneeRepository $journeeRepository, EntityManagerInterface $entityManager)
    {
        $this->journeeRepository = $journeeRepository;
        $this->entityManager = $entityManager;
    }

    public function openJournee(): Journee
    {
        $journee = new Journee();
        $journee->setStartedAt(new \DateTimeImmutable());
        $journee->setActive(true);
        $this->entityManager->persist($journee);
        $this->entityManager->flush();

        return $journee;
    }

    public function getActiveJournee(): ?Journee
    {
        return $this->journeeRepository->findActiveJournee();
    }
}
