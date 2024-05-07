<?php

namespace App\Entity;

use App\Repository\FdbRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FdbRepository::class)]
class Fdb
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $numero_fiche_besoin = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column(length: 255)]
    private ?string $objet = null;

    #[ORM\Column(length: 255)]
    private ?string $responsable = null;

    #[ORM\Column(length: 255)]
    private ?string $destinataire = null;

    #[ORM\Column(length: 255)]
    private ?string $departement = null;

    #[ORM\Column(length: 255)]
    private ?string $signature = null;

   
    #[ORM\ManyToOne(inversedBy: 'fdb')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroFicheBesoin(): ?string
    {
        return $this->numero_fiche_besoin;
    }

    public function setNumeroFicheBesoin(string $numero_fiche_besoin): static
    {
        $this->numero_fiche_besoin = $numero_fiche_besoin;

        return $this;
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

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): static
    {
        $this->objet = $objet;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): static
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getDestinataire(): ?string
    {
        return $this->destinataire;
    }

    public function setDestinataire(string $destinataire): static
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $département): static
    {
        $this->departement = $département;

        return $this;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function setSignature(string $signature): static
    {
        $this->signature = $signature;

        return $this;
    }



    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
