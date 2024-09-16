<?php
// src/Security/UserChecker.php
namespace App\Security;

use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\User;

class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        if (!$user instanceof User) {
            return;
        }

        if (!$user->getIsActive()) {  // Utilise getIsActive() au lieu de isActive()
            throw new CustomUserMessageAccountStatusException('Votre compte a été désactivé.');
        }
    }

    public function checkPostAuth(UserInterface $user): void
    {
        // D'autres vérifications peuvent être ajoutées ici
    }
}
