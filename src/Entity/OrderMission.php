<?php

namespace App\Entity;

use App\Repository\OrderMissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: OrderMissionRepository::class)]
class OrderMission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'uuid', nullable: true)]
    private ?Uuid $uuid = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $reference = null;

    #[ORM\Column(length: 255)]
    private ?string $gerant = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDepart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateRetour = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fonction = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $service = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $beneficiaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $montant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $orderTo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $getTo = null;

    #[ORM\ManyToOne(inversedBy: 'orderMissions')]
    private ?Fdb $fdb = null;

    #[ORM\ManyToOne(inversedBy: 'orderMissions')]
    private ?Caisse $caisse = null;

    /**
     * @var Collection<int, JournalCaisse>
     */
    #[ORM\OneToMany(targetEntity: JournalCaisse::class, mappedBy: 'orderMission')]
    private Collection $journalCaisse;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fullName = null;

    /**
     * @var Collection<int, BonMission>
     */
    #[ORM\OneToMany(targetEntity: BonMission::class, mappedBy: 'OrderMission')]
    private Collection $bonMissions;

    #[ORM\Column(nullable: true)]
    private ?bool $isActive = null;

    #[ORM\ManyToOne(inversedBy: 'orderMissions')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'orderMissions')]
    private ?Expense $expense = null;

    #[ORM\ManyToOne(inversedBy: 'orderMissions')]
    private ?TypeExpense $typeExpense = null;

    #[ORM\ManyToOne(inversedBy: 'orderMissions')]
    private ?Emeteur $emeteur = null;

//    #[ORM\ManyToOne(inversedBy: 'orderMissions')]
//    private ?Journee $journee = null;

//    #[ORM\ManyToOne(inversedBy: 'orderMissions')]
//    private ?User $validBy = null;

    /**
     * @var Collection<int, DetailMission>
     */
    #[ORM\OneToMany(targetEntity: DetailMission::class, mappedBy: 'orderMission')]
    private Collection $detailMission;

//    /**
//     * @var Collection<int, Detail>
//     */
//    #[ORM\OneToMany(targetEntity: Detail::class, mappedBy: 'orderMission')]
//    private Collection $detail;

    /**
     * @var Collection<int, DetailBonMission>
     */
    #[ORM\OneToMany(targetEntity: DetailBonMission::class, mappedBy: 'orderMission')]
    private Collection $DetailBonMission;

//    /**
//     * @var Collection<int, Notification>
//     */
//    #[ORM\OneToMany(targetEntity: Notification::class, mappedBy: 'OrderMission')]
//    private Collection $notifications;

    public function __construct()
    {
        $this->journalCaisse = new ArrayCollection();
        $this->bonMissions = new ArrayCollection();
        $this->detailMission = new ArrayCollection();
//        $this->detail = new ArrayCollection();
        $this->DetailBonMission = new ArrayCollection();
//        $this->notifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?Uuid
    {
        return $this->uuid;
    }

    public function setUuid(?Uuid $uuid): static
    {
        $this->uuid = $uuid;

        return $this;
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

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

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->dateDepart;
    }

    public function setDateDepart(?\DateTimeInterface $dateDepart): static
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->dateRetour;
    }

    public function setDateRetour(?\DateTimeInterface $dateRetour): static
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): static
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(?string $service): static
    {
        $this->service = $service;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getBeneficiaire(): ?string
    {
        return $this->beneficiaire;
    }

    public function setBeneficiaire(?string $beneficiaire): static
    {
        $this->beneficiaire = $beneficiaire;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(?string $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getOrderTo(): ?string
    {
        return $this->orderTo;
    }

    public function setOrderTo(?string $orderTo): static
    {
        $this->orderTo = $orderTo;

        return $this;
    }

    public function getGetTo(): ?string
    {
        return $this->getTo;
    }

    public function setGetTo(?string $getTo): static
    {
        $this->getTo = $getTo;

        return $this;
    }

    public function getFdb(): ?Fdb
    {
        return $this->fdb;
    }

    public function setFdb(?Fdb $fdb): static
    {
        $this->fdb = $fdb;

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

    /**
     * @return Collection<int, JournalCaisse>
     */
    public function getJournalCaisse(): Collection
    {
        return $this->journalCaisse;
    }

    public function addJournalCaisse(JournalCaisse $journalCaisse): static
    {
        if (!$this->journalCaisse->contains($journalCaisse)) {
            $this->journalCaisse->add($journalCaisse);
            $journalCaisse->setOrderMission($this);
        }

        return $this;
    }

    public function removeJournalCaisse(JournalCaisse $journalCaisse): static
    {
        if ($this->journalCaisse->removeElement($journalCaisse)) {
            // set the owning side to null (unless already changed)
            if ($journalCaisse->getOrderMission() === $this) {
                $journalCaisse->setOrderMission(null);
            }
        }

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): static
    {
        $this->fullName = $fullName;

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
            $bonMission->setOrderMission($this);
        }

        return $this;
    }

    public function removeBonMission(BonMission $bonMission): static
    {
        if ($this->bonMissions->removeElement($bonMission)) {
            // set the owning side to null (unless already changed)
            if ($bonMission->getOrderMission() === $this) {
                $bonMission->setOrderMission(null);
            }
        }

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setActive(?bool $isActive): static
    {
        $this->isActive = $isActive;

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


    public function getExpense(): ?Expense
    {
        return $this->expense;
    }

    public function setExpense(?Expense $expense): static
    {
        $this->expense = $expense;

        return $this;
    }

    public function getTypeExpense(): ?TypeExpense
    {
        return $this->typeExpense;
    }

    public function setTypeExpense(?TypeExpense $typeExpense): static
    {
        $this->typeExpense = $typeExpense;

        return $this;
    }

    public function getEmeteur(): ?Emeteur
    {
        return $this->emeteur;
    }

    public function setEmeteur(?Emeteur $emeteur): static
    {
        $this->emeteur = $emeteur;

        return $this;
    }

//    public function getJournee(): ?Journee
//    {
//        return $this->journee;
//    }
//
//    public function setJournee(?Journee $journee): static
//    {
//        $this->journee = $journee;
//
//        return $this;
//    }

//    public function getValidBy(): ?User
//    {
//        return $this->validBy;
//    }
//
//    public function setValidBy(?User $validBy): static
//    {
//        $this->validBy = $validBy;
//
//        return $this;
//    }

    /**
     * @return Collection<int, DetailMission>
     */
    public function getDetailMission(): Collection
    {
        return $this->detailMission;
    }

    public function addDetailMission(DetailMission $detailMission): static
    {
        if (!$this->detailMission->contains($detailMission)) {
            $this->detailMission->add($detailMission);
            $detailMission->setOrderMission($this);
        }

        return $this;
    }

    public function removeDetailMission(DetailMission $detailMission): static
    {
        if ($this->detailMission->removeElement($detailMission)) {
            // set the owning side to null (unless already changed)
            if ($detailMission->getOrderMission() === $this) {
                $detailMission->setOrderMission(null);
            }
        }

        return $this;
    }

//    /**
//     * @return Collection<int, Detail>
//     */
//    public function getDetail(): Collection
//    {
//        return $this->detail;
//    }
//
//    public function addDetail(Detail $detail): static
//    {
//        if (!$this->detail->contains($detail)) {
//            $this->detail->add($detail);
//            $detail->setOrderMission($this);
//        }
//
//        return $this;
//    }
//
//    public function removeDetail(Detail $detail): static
//    {
//        if ($this->detail->removeElement($detail)) {
//            // set the owning side to null (unless already changed)
//            if ($detail->getOrderMission() === $this) {
//                $detail->setOrderMission(null);
//            }
//        }
//
//        return $this;
//    }

    /**
     * @return Collection<int, DetailBonMission>
     */
    public function getDetailBonMission(): Collection
    {
        return $this->DetailBonMission;
    }

    public function addDetailBonMission(DetailBonMission $detailBonMission): static
    {
        if (!$this->DetailBonMission->contains($detailBonMission)) {
            $this->DetailBonMission->add($detailBonMission);
            $detailBonMission->setOrderMission($this);
        }

        return $this;
    }

    public function removeDetailBonMission(DetailBonMission $detailBonMission): static
    {
        if ($this->DetailBonMission->removeElement($detailBonMission)) {
            // set the owning side to null (unless already changed)
            if ($detailBonMission->getOrderMission() === $this) {
                $detailBonMission->setOrderMission(null);
            }
        }

        return $this;
    }
//
//    /**
//     * @return Collection<int, Notification>
//     */
//    public function getNotifications(): Collection
//    {
//        return $this->notifications;
//    }
//
//    public function addNotification(Notification $notification): static
//    {
//        if (!$this->notifications->contains($notification)) {
//            $this->notifications->add($notification);
//            $notification->setOrderMission($this);
//        }
//
//        return $this;
//    }
//
//    public function removeNotification(Notification $notification): static
//    {
//        if ($this->notifications->removeElement($notification)) {
//            // set the owning side to null (unless already changed)
//            if ($notification->getOrderMission() === $this) {
//                $notification->setOrderMission(null);
//            }
//        }
//
//        return $this;
//    }
}
