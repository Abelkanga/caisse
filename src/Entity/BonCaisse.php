<?php

namespace App\Entity;

use App\Repository\BonCaisseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BonCaisseRepository::class)]
class BonCaisse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $montant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $uuid = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    /**
     * @var Collection<int, Fdb>
     */
    #[ORM\OneToMany(targetEntity: Fdb::class, mappedBy: 'bonCaisse')]
    private Collection $fdb;

    /**
     * @var Collection<int, Depense>
     */
    #[ORM\OneToMany(targetEntity: Depense::class, mappedBy: 'bonCaisse')]
    private Collection $depense;

    /**
     * @var Collection<int, Bonapprovisionnement>
     */
    #[ORM\OneToMany(targetEntity: Bonapprovisionnement::class, mappedBy: 'bonCaisse')]
    private Collection $bonapprovisionnement;

    public function __construct()
    {
        $this->fdb = new ArrayCollection();
        $this->depense = new ArrayCollection();
        $this->bonapprovisionnement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(?string $uuid): static
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return Collection<int, Fdb>
     */
    public function getFdb(): Collection
    {
        return $this->fdb;
    }

    public function addFdb(Fdb $fdb): static
    {
        if (!$this->fdb->contains($fdb)) {
            $this->fdb->add($fdb);
            $fdb->setBonCaisse($this);
        }

        return $this;
    }

    public function removeFdb(Fdb $fdb): static
    {
        if ($this->fdb->removeElement($fdb)) {
            // set the owning side to null (unless already changed)
            if ($fdb->getBonCaisse() === $this) {
                $fdb->setBonCaisse(null);
            }
        }

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
            $depense->setBonCaisse($this);
        }

        return $this;
    }

    public function removeDepense(Depense $depense): static
    {
        if ($this->depense->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getBonCaisse() === $this) {
                $depense->setBonCaisse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Bonapprovisionnement>
     */
    public function getBonapprovisionnement(): Collection
    {
        return $this->bonapprovisionnement;
    }

    public function addBonapprovisionnement(Bonapprovisionnement $bonapprovisionnement): static
    {
        if (!$this->bonapprovisionnement->contains($bonapprovisionnement)) {
            $this->bonapprovisionnement->add($bonapprovisionnement);
            $bonapprovisionnement->setBonCaisse($this);
        }

        return $this;
    }

    public function removeBonapprovisionnement(Bonapprovisionnement $bonapprovisionnement): static
    {
        if ($this->bonapprovisionnement->removeElement($bonapprovisionnement)) {
            // set the owning side to null (unless already changed)
            if ($bonapprovisionnement->getBonCaisse() === $this) {
                $bonapprovisionnement->setBonCaisse(null);
            }
        }

        return $this;
    }
}
