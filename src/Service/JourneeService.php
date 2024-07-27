<?php

namespace App\Service;

use App\Entity\Journee;
use App\Entity\User;
use App\Repository\JourneeRepository;
use Symfony\Bundle\SecurityBundle\Security;

class JourneeService
{
    public function __construct(
        private Security $security,
        private JourneeRepository $journeeRepository
    ) {}

    public function getActive(): ?Journee
    {
        /** @var User $user */
        $user = $this->security->getUser();

        if ($user && $user->getCaisse()) {
            return $this->journeeRepository->findActiveJourneeByCaisse($user->getCaisse());
        }

        return null;
    }
}