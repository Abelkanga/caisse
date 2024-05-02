<?php

namespace App\Entity;

use App\Repository\BdaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BdaRepository::class)]
class Bda
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column(length: 255)]
    private ?string $Modepaie = null;

    #[ORM\Column(length: 255)]
    private ?string $numerocheque = null;

    #[ORM\Column]
    private ?int $montanttotal = null;

    #[ORM\Column(length: 255)]
    private ?string $nature = null;

    #[ORM\ManyToOne(inversedBy: 'bda')]
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

    public function getModepaie(): ?string
    {
        return $this->Modepaie;
    }

    public function setModepaie(string $Modepaie): static
    {
        $this->Modepaie = $Modepaie;

        return $this;
    }

    public function getNumerocheque(): ?string
    {
        return $this->numerocheque;
    }

    public function setNumerocheque(string $numerocheque): static
    {
        $this->numerocheque = $numerocheque;

        return $this;
    }

    public function getMontanttotal(): ?int
    {
        return $this->montanttotal;
    }

    public function setMontanttotal(int $montanttotal): static
    {
        $this->montanttotal = $montanttotal;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature): static
    {
        $this->nature = $nature;

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
