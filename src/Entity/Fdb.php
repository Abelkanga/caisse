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
    private ?string $numéroFDB = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column(length: 255)]
    private ?string $objet = null;

    #[ORM\Column(length: 255)]
    private ?string $responsable = null;

    #[ORM\Column(length: 255)]
    private ?string $destinataire = null;

    #[ORM\Column(length: 255)]
    private ?string $département = null;

    #[ORM\Column(length: 255)]
    private ?string $signature = null;

    /**
     * @var Collection<int, Depense>
     */
    #[ORM\OneToMany(targetEntity: Depense::class, mappedBy: 'fdb')]
    private Collection $depense;

    #[ORM\ManyToOne(inversedBy: 'fdb')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function __construct()
    {
        $this->depense = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNuméroFDB(): ?string
    {
        return $this->numéroFDB;
    }

    public function setNuméroFDB(string $numéroFDB): static
    {
        $this->numéroFDB = $numéroFDB;

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

    public function getDépartement(): ?string
    {
        return $this->département;
    }

    public function setDépartement(string $département): static
    {
        $this->département = $département;

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

    /**
     * @return Collection<int, Depense>
     */
    public function getDepense(): Collection
    {
        return $this->depense;
    }

    public function addDepense(Depense $depense): static
    {
        if (!$this->depense->contains($depense)) {
            $this->depense->add($depense);
            $depense->setFdb($this);
        }

        return $this;
    }

    public function removeDepense(Depense $depense): static
    {
        if ($this->depense->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getFdb() === $this) {
                $depense->setFdb(null);
            }
        }

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
