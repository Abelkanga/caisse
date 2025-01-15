<?php

namespace App\Entity;

use App\Repository\JourneeRepository;
use App\Traits\Horodatage;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JourneeRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Journee
{

    use Horodatage;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'journees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Caisse $caisse = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $startedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closeAt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $debit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $credit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $solde = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $lastSolde = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 255)]
    private ?string $uuid = null;

    #[ORM\OneToOne(targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $LastJournee = null;

    /**
     * @var Collection<int, Bonapprovisionnement>
     */
    #[ORM\OneToMany(targetEntity: Bonapprovisionnement::class, mappedBy: 'journee')]
    private Collection $bonapprovisionnements;

    /**
     * @var Collection<int, Fdb>
     */
    #[ORM\OneToMany(targetEntity: Fdb::class, mappedBy: 'journee')]
    private Collection $fdbs;

    #[ORM\OneToOne(mappedBy: 'journee', cascade: ['persist', 'remove'])]
    private ?Billetage $billetage = null;

    /**
     * @var Collection<int, ApproCaisse>
     */
    #[ORM\OneToMany(targetEntity: ApproCaisse::class, mappedBy: 'journee')]
    private Collection $approCaisses;

    /**
     * @var Collection<int, OrderMission>
     */
    #[ORM\OneToMany(targetEntity: OrderMission::class, mappedBy: 'journee')]
    private Collection $orderMissions;


    public function __construct()
    {
        $this->bonapprovisionnements = new ArrayCollection();
        $this->fdbs = new ArrayCollection();
        $this->approCaisses = new ArrayCollection();
        $this->orderMissions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getStartedAt(): ?\DateTimeImmutable
    {
        return $this->startedAt;
    }

    public function setStartedAt(\DateTimeImmutable $startedAt): static
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    #[ORM\PrePersist]
    public function setUpdatedAt(): static
    {
        $this->updatedAt = new \DateTimeImmutable();

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getCloseAt(): ?\DateTimeInterface
    {
        return $this->closeAt;
    }

    public function setCloseAt(?\DateTimeInterface $closeAt): static
    {
        $this->closeAt = $closeAt;

        return $this;
    }

    public function getDebit(): ?string
    {
        return $this->debit;
    }

    public function setDebit(?string $debit): static
    {
        $this->debit = $debit;

        return $this;
    }

    public function getCredit(): ?string
    {
        return $this->credit;
    }

    public function setCredit(?string $credit): static
    {
        $this->credit = $credit;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(?string $solde): static
    {
        $this->solde = $solde;

        return $this;
    }

    public function getLastSolde(): ?string
    {
        return $this->lastSolde;
    }

    public function setLastSolde(?string $lastSolde): static
    {
        $this->lastSolde = $lastSolde;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAt(): static
    {
        $this->createdAt = new \DateTimeImmutable();

        return $this;
    }
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): static
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getLastJournee(): ?self
    {
        return $this->LastJournee;
    }

    public function setLastJournee(?self $LastJournee): static
    {
        $this->LastJournee = $LastJournee;

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
            $bonapprovisionnement->setJournee($this);
        }

        return $this;
    }

    public function removeBonapprovisionnement(Bonapprovisionnement $bonapprovisionnement): static
    {
        if ($this->bonapprovisionnements->removeElement($bonapprovisionnement)) {
            // set the owning side to null (unless already changed)
            if ($bonapprovisionnement->getJournee() === $this) {
                $bonapprovisionnement->setJournee(null);
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
            $fdb->setJournee($this);
        }

        return $this;
    }

    public function removeFdb(Fdb $fdb): static
    {
        if ($this->fdbs->removeElement($fdb)) {
            // set the owning side to null (unless already changed)
            if ($fdb->getJournee() === $this) {
                $fdb->setJournee(null);
            }
        }

        return $this;
    }

    public function getBilletage(): ?Billetage
    {
        return $this->billetage;
    }

    public function setBilletage(?Billetage $billetage): static
    {
        // unset the owning side of the relation if necessary
        if ($billetage === null && $this->billetage !== null) {
            $this->billetage->setJournee(null);
        }

        // set the owning side of the relation if necessary
        if ($billetage !== null && $billetage->getJournee() !== $this) {
            $billetage->setJournee($this);
        }

        $this->billetage = $billetage;

        return $this;
    }

    /**
     * @return Collection<int, ApproCaisse>
     */
    public function getApproCaisses(): Collection
    {
        return $this->approCaisses;
    }

    public function addApproCaiss(ApproCaisse $approCaiss): static
    {
        if (!$this->approCaisses->contains($approCaiss)) {
            $this->approCaisses->add($approCaiss);
            $approCaiss->setJournee($this);
        }

        return $this;
    }

    public function removeApproCaiss(ApproCaisse $approCaiss): static
    {
        if ($this->approCaisses->removeElement($approCaiss)) {
            // set the owning side to null (unless already changed)
            if ($approCaiss->getJournee() === $this) {
                $approCaiss->setJournee(null);
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
            $orderMission->setJournee($this);
        }

        return $this;
    }

    public function removeOrderMission(OrderMission $orderMission): static
    {
        if ($this->orderMissions->removeElement($orderMission)) {
            // set the owning side to null (unless already changed)
            if ($orderMission->getJournee() === $this) {
                $orderMission->setJournee(null);
            }
        }

        return $this;
    }

}
