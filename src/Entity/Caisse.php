<?php

namespace App\Entity;

use App\Repository\CaisseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaisseRepository::class)]
class Caisse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $intitule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $responsable = null;

    #[ORM\Column(type: Types::DECIMAL,precision: 10, scale: 2,nullable: true)]
    private ?string $Soldedispo = null;

    #[ORM\Column(type: Types::DECIMAL,precision: 10, scale: 2,)]
    private ?string $plafond = null;

    #[ORM\Column(length: 255)]
    private ?string $gerant = null;


    /**
     * @var Collection<int, Depense>
     */
    #[ORM\OneToMany(targetEntity: Depense::class, mappedBy: 'caisse')]
    private Collection $depenses;

    /**
     * @var Collection<int, Bonapprovisionnement>
     */
    #[ORM\OneToMany(targetEntity: Bonapprovisionnement::class, mappedBy: 'caisse')]
    private Collection $bonapprovisionnements;


    /**
     * @var Collection<int, Journee>
     */
    #[ORM\OneToMany(targetEntity: Journee::class, mappedBy: 'caisse')]
    private Collection $journees;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'caisse')]
    private Collection $users;

    /**
     * @var Collection<int, Fdb>
     */
    #[ORM\OneToMany(targetEntity: Fdb::class, mappedBy: 'caisse')]
    private Collection $fdbs;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    /**
     * @var Collection<int, BonCaisse>
     */
    #[ORM\OneToMany(targetEntity: BonCaisse::class, mappedBy: 'caisse')]
    private Collection $bonCaisses;

    public function __construct()
    {
        $this->depenses = new ArrayCollection();
        $this->bonapprovisionnements = new ArrayCollection();
        $this->journees = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->fdbs = new ArrayCollection();
        $this->bonCaisses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): static
    {
        $this->intitule = $intitule;

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

    public function getSoldedispo(): ?string
    {
        return $this->Soldedispo;
    }

    public function setSoldedispo(?string $Soldedispo): static
    {
        $this->Soldedispo = $Soldedispo;

        return $this;
    }

    public function getPlafond(): ?string
    {
        return $this->plafond;
    }

    public function setPlafond(?string $plafond): static
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


    /**
     * @return Collection<int, Depense>
     */
    public function getDepenses(): Collection
    {
        return $this->depenses;
    }

    public function addDepense(Depense $depense): static
    {
        if (!$this->depenses->contains($depense)) {
            $this->depenses->add($depense);
            $depense->setCaisse($this);
        }

        return $this;
    }

    public function removeDepense(Depense $depense): static
    {
        if ($this->depenses->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getCaisse() === $this) {
                $depense->setCaisse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Bonapprovisionnement>
     */
    public function getBonapprovisionnements(): Collection
    {
        return $this->bonapprovisionnements;
    }

    public function addBonapprovisionnement(Bonapprovisionnement $bonapprovisionnement): static
    {
        if (!$this->bonapprovisionnements->contains($bonapprovisionnement)) {
            $this->bonapprovisionnements->add($bonapprovisionnement);
            $bonapprovisionnement->setCaisse($this);
        }

        return $this;
    }

    public function removeBonapprovisionnement(Bonapprovisionnement $bonapprovisionnement): static
    {
        if ($this->bonapprovisionnements->removeElement($bonapprovisionnement)) {
            // set the owning side to null (unless already changed)
            if ($bonapprovisionnement->getCaisse() === $this) {
                $bonapprovisionnement->setCaisse(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection<int, Journee>
     */
    public function getJournees(): Collection
    {
        return $this->journees;
    }

    public function addJournee(Journee $journee): static
    {
        if (!$this->journees->contains($journee)) {
            $this->journees->add($journee);
            $journee->setCaisse($this);
        }

        return $this;
    }

    public function removeJournee(Journee $journee): static
    {
        if ($this->journees->removeElement($journee)) {
            // set the owning side to null (unless already changed)
            if ($journee->getCaisse() === $this) {
                $journee->setCaisse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setCaisse($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCaisse() === $this) {
                $user->setCaisse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Fdb>
     */
    public function getFdbs(): Collection
    {
        return $this->fdbs;
    }

    public function addFdb(Fdb $fdb): static
    {
        if (!$this->fdbs->contains($fdb)) {
            $this->fdbs->add($fdb);
            $fdb->setCaisse($this);
        }

        return $this;
    }

    public function removeFdb(Fdb $fdb): static
    {
        if ($this->fdbs->removeElement($fdb)) {
            // set the owning side to null (unless already changed)
            if ($fdb->getCaisse() === $this) {
                $fdb->setCaisse(null);
            }
        }

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function __toString(): string
    {
        return $this->intitule;
    }

    /**
     * @return Collection<int, BonCaisse>
     */
    public function getBonCaisses(): Collection
    {
        return $this->bonCaisses;
    }

    public function addBonCaiss(BonCaisse $bonCaiss): static
    {
        if (!$this->bonCaisses->contains($bonCaiss)) {
            $this->bonCaisses->add($bonCaiss);
            $bonCaiss->setCaisse($this);
        }

        return $this;
    }

    public function removeBonCaiss(BonCaisse $bonCaiss): static
    {
        if ($this->bonCaisses->removeElement($bonCaiss)) {
            // set the owning side to null (unless already changed)
            if ($bonCaiss->getCaisse() === $this) {
                $bonCaiss->setCaisse(null);
            }
        }

        return $this;
    }

}
