<?php

namespace App\Entity;

use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\NotBlank;

class UpdatePassword
{
    #[UserPassword]
    private ?string $password = null;

    #[NotBlank]
    #[Assert\Regex(
        pattern: '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
        message: "Le mot de passe doit contenir des lettres, des chiffres et des symboles"
    )]
    private ?string $newPassword = null;

    #[NotBlank, EqualTo(propertyPath: 'newPassword')]
    private ?string $confirmPassword = null;

    public function getPassword(): ?string

    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getNewPassword(): ?string
    {
        return $this->newPassword;
    }

    public function setNewPassword(string $newPassword): self
    {
        $this->newPassword = $newPassword;
        return $this;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->confirmPassword;
    }

    public function setConfirmPassword(string $confirmPassword): self
    {
        $this->confirmPassword = $confirmPassword;
        return $this;
    }
}
