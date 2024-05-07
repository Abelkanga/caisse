<?php

namespace App\Entity;

use App\Repository\CaisseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaisseRepository::class)]
class Caisse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $intitulé = null;

    #[ORM\Column(length: 255)]
    private ?string $responsable = null;

    #[ORM\Column]
    private ?int $Soldedispo = null;

    #[ORM\Column]
    private ?bool $plafond = null;

    #[ORM\Column(length: 255)]
    private ?string $gerant = null;


    #[ORM\ManyToOne(inversedBy: 'caisse')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    /**
     * @var Collection<int, Operation>
     */
    #[ORM\OneToMany(targetEntity: Operation::class, mappedBy: 'caisse')]
    private Collection $operations;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitulé(): ?string
    {
        return $this->intitulé;
    }

    public function setIntitulé(string $intitulé): static
    {
        $this->intitulé = $intitulé;

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

    public function getSoldedispo(): ?int
    {
        return $this->Soldedispo;
    }

    public function setSoldedispo(int $Soldedispo): static
    {
        $this->Soldedispo = $Soldedispo;

        return $this;
    }

    public function isPlafond(): ?bool
    {
        return $this->plafond;
    }

    public function setPlafond(bool $plafond): static
    {
        $this->plafond = $plafond;

        return $this;
    }

    public function getGerant(): ?string
    {
        return $this->gerant;
    }

    public function setGerant(string $gerant): static
    {
        $this->gerant = $gerant;

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

    /**
     * @return Collection<int, Operation>
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operation $operation): static
    {
        if (!$this->operations->contains($operation)) {
            $this->operations->add($operation);
            $operation->setCaisse($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): static
    {
        if ($this->operations->removeElement($operation)) {
            // set the owning side to null (unless already changed)
            if ($operation->getCaisse() === $this) {
                $operation->setCaisse(null);
            }
        }

        return $this;
    }
}
