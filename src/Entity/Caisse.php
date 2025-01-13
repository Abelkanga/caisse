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

    #[ORM\Column(length: 255)]
    private ?string $plafond = null;

    #[ORM\Column(length: 255)]
    private ?string $responsable = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(type: Types::DECIMAL,precision: 10, scale: 2,nullable: true)]
    private ?string $Soldedispo = null;

    /**
     * @var Collection<int, Bonapprovisionnement>
     */
    #[ORM\OneToMany(targetEntity: Bonapprovisionnement::class, mappedBy: 'caisse')]
    private Collection $bonapprovisionnements;

    /**
     * @var Collection<int, Depense>
     */
    #[ORM\OneToMany(targetEntity: Depense::class, mappedBy: 'caisse')]
    private Collection $depenses;


    /**
     * @var Collection<int, Fdb>
     */
    #[ORM\OneToMany(targetEntity: Fdb::class, mappedBy: 'caisse')]
    private Collection $fdbs;

    #[ORM\OneToOne(inversedBy: 'caisse', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    /**
     * @var Collection<int, RecuCaisse>
     */
    #[ORM\OneToMany(targetEntity: RecuCaisse::class, mappedBy: 'caisse')]
    private Collection $recuCaisses;


    /**
     * @var Collection<int, BonCaisse>
     */
    #[ORM\OneToMany(targetEntity: BonCaisse::class, mappedBy: 'caisse')]
    private Collection $bonCaisses;


    /**
     * @var Collection<int, JournalCaisse>
     */
    #[ORM\OneToMany(targetEntity: JournalCaisse::class, mappedBy: 'caisse')]
    private Collection $journalCaisses;

    /**
     * @var Collection<int, Billetage>
     */
    #[ORM\OneToMany(targetEntity: Billetage::class, mappedBy: 'caisse')]
    private Collection $billetages;

    /**
     * @var Collection<int, Journee>
     */
    #[ORM\OneToMany(targetEntity: Journee::class, mappedBy: 'caisse')]
    private Collection $journees;

    /**
     * @var Collection<int, ApproCaisse> Approvisionnements envoyés
     */
    #[ORM\OneToMany(targetEntity: ApproCaisse::class, mappedBy: 'caisseEmettrice')]
    private Collection $approCaissesEmettrices;

    /**
     * @var Collection<int, ApproCaisse> Approvisionnements reçus
     */
    #[ORM\OneToMany(targetEntity: ApproCaisse::class, mappedBy: 'caisseReceptrice')]
    private Collection $approCaissesReceptrices;

    /**
     * @var Collection<int, OrderMission>
     */
    #[ORM\OneToMany(targetEntity: OrderMission::class, mappedBy: 'caisse')]
    private Collection $orderMissions;

    /**
     * @var Collection<int, BonMission>
     */
    #[ORM\OneToMany(targetEntity: BonMission::class, mappedBy: 'Caisse')]
    private Collection $bonMissions;


    public function __construct()
    {
        $this->depenses = new ArrayCollection();
        $this->bonapprovisionnements = new ArrayCollection();
        $this->journees = new ArrayCollection();
        $this->fdbs = new ArrayCollection();
        $this->bonCaisses = new ArrayCollection();
        $this->billetages = new ArrayCollection();
        $this->recuCaisses = new ArrayCollection();
        $this->journalCaisses = new ArrayCollection();
        $this->approCaissesEmettrices = new ArrayCollection();
        $this->approCaissesReceptrices = new ArrayCollection();
        $this->orderMissions = new ArrayCollection();
        $this->bonMissions = new ArrayCollection();
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

    /**
     * @return Collection<int, Billetage>
     */
    public function getBilletages(): Collection
    {
        return $this->billetages;
    }

    public function addBilletage(Billetage $billetage): static
    {
        if (!$this->billetages->contains($billetage)) {
            $this->billetages->add($billetage);
            $billetage->setCaisse($this);
        }

        return $this;
    }

    public function removeBilletage(Billetage $billetage): static
    {
        if ($this->billetages->removeElement($billetage)) {
            // set the owning side to null (unless already changed)
            if ($billetage->getCaisse() === $this) {
                $billetage->setCaisse(null);
            }
        }

        return $this;
    }


//    public function getJournalCaisse(): ?JournalCaisse
//    {
//        return $this->JournalCaisse;
//    }
//
//    public function setJournalCaisse(?JournalCaisse $JournalCaisse): static
//    {
//        $this->JournalCaisse = $JournalCaisse;
//
//        return $this;
//    }

    public function getLastSolde(): ?string
    {
        return $this->lastSolde;
    }

    public function setLastSolde(?string $lastSolde): static
    {
        $this->lastSolde = $lastSolde;

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
     * @return Collection<int, RecuCaisse>
     */
    public function getRecuCaisses(): Collection
    {
        return $this->recuCaisses;
    }

    public function addRecuCaiss(RecuCaisse $recuCaiss): static
    {
        if (!$this->recuCaisses->contains($recuCaiss)) {
            $this->recuCaisses->add($recuCaiss);
            $recuCaiss->setCaisse($this);
        }

        return $this;
    }

    public function removeRecuCaiss(RecuCaisse $recuCaiss): static
    {
        if ($this->recuCaisses->removeElement($recuCaiss)) {
            // set the owning side to null (unless already changed)
            if ($recuCaiss->getCaisse() === $this) {
                $recuCaiss->setCaisse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, JournalCaisse>
     */
    public function getJournalCaisses(): Collection
    {
        return $this->journalCaisses;
    }

    public function addJournalCaiss(JournalCaisse $journalCaiss): static
    {
        if (!$this->journalCaisses->contains($journalCaiss)) {
            $this->journalCaisses->add($journalCaiss);
            $journalCaiss->setCaisse($this);
        }

        return $this;
    }

    public function removeJournalCaiss(JournalCaisse $journalCaiss): static
    {
        if ($this->journalCaisses->removeElement($journalCaiss)) {
            // set the owning side to null (unless already changed)
            if ($journalCaiss->getCaisse() === $this) {
                $journalCaiss->setCaisse(null);
            }
        }

        return $this;
    }

    public function getApproCaissesEmettrices(): Collection
    {
        return $this->approCaissesEmettrices;
    }

    public function addApproCaissesEmettrice(ApproCaisse $approCaisse): self
    {
        if (!$this->approCaissesEmettrices->contains($approCaisse)) {
            $this->approCaissesEmettrices[] = $approCaisse;
            $approCaisse->setCaisseEmettrice($this);
        }

        return $this;
    }

    public function removeApproCaissesEmettrice(ApproCaisse $approCaisse): self
    {
        if ($this->approCaissesEmettrices->removeElement($approCaisse)) {
            // set the owning side to null (unless already changed)
            if ($approCaisse->getCaisseEmettrice() === $this) {
                $approCaisse->setCaisseEmettrice(null);
            }
        }

        return $this;
    }

    public function getApproCaissesReceptrices(): Collection
    {
        return $this->approCaissesReceptrices;
    }

    public function addApproCaissesReceptrice(ApproCaisse $approCaisse): self
    {
        if (!$this->approCaissesReceptrices->contains($approCaisse)) {
            $this->approCaissesReceptrices[] = $approCaisse;
            $approCaisse->setCaisseReceptrice($this);
        }

        return $this;
    }

    public function removeApproCaissesReceptrice(ApproCaisse $approCaisse): self
    {
        if ($this->approCaissesReceptrices->removeElement($approCaisse)) {
            // set the owning side to null (unless already changed)
            if ($approCaisse->getCaisseReceptrice() === $this) {
                $approCaisse->setCaisseReceptrice(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, OrderMission>
     */
    public function getOrderMissions(): Collection
    {
        return $this->orderMissions;
    }

    public function addOrderMission(OrderMission $orderMission): static
    {
        if (!$this->orderMissions->contains($orderMission)) {
            $this->orderMissions->add($orderMission);
            $orderMission->setCaisse($this);
        }

        return $this;
    }

    public function removeOrderMission(OrderMission $orderMission): static
    {
        if ($this->orderMissions->removeElement($orderMission)) {
            // set the owning side to null (unless already changed)
            if ($orderMission->getCaisse() === $this) {
                $orderMission->setCaisse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, BonMission>
     */
    public function getBonMissions(): Collection
    {
        return $this->bonMissions;
    }

    public function addBonMission(BonMission $bonMission): static
    {
        if (!$this->bonMissions->contains($bonMission)) {
            $this->bonMissions->add($bonMission);
            $bonMission->setCaisse($this);
        }

        return $this;
    }

    public function removeBonMission(BonMission $bonMission): static
    {
        if ($this->bonMissions->removeElement($bonMission)) {
            // set the owning side to null (unless already changed)
            if ($bonMission->getCaisse() === $this) {
                $bonMission->setCaisse(null);
            }
        }

        return $this;
    }


}
