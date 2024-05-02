<?php

namespace App\Entity;

use App\Repository\EdcRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EdcRepository::class)]
class Edc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column]
    private ?int $solde = null;

    #[ORM\Column]
    private ?int $encaissement = null;

    #[ORM\Column]
    private ?int $decaissement = null;

    #[ORM\ManyToOne(inversedBy: 'edc')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Caisse $caisse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(int $solde): static
    {
        $this->solde = $solde;

        return $this;
    }

    public function getEncaissement(): ?int
    {
        return $this->encaissement;
    }

    public function setEncaissement(int $encaissement): static
    {
        $this->encaissement = $encaissement;

        return $this;
    }

    public function getDecaissement(): ?int
    {
        return $this->decaissement;
    }

    public function setDecaissement(int $decaissement): static
    {
        $this->decaissement = $decaissement;

        return $this;
    }

    public function getCaisse(): ?Caisse
    {
        return $this->caisse;
    }

    public function setCaisse(?Caisse $caisse): static
    {
        $this->caisse = $caisse;

        return $this;
    }
}
