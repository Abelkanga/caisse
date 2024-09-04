<?php

namespace App\Entity;

use App\Repository\FdbRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: FdbRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Fdb
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $numero_fiche_besoin = null;

//    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
//    private ?\DateTimeImmutable $date = null;

//    #[ORM\Column(length: 255)]
//    private ?string $objet = null;

    #[ORM\Column(length: 255)]
    private ?string $destinataire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $departement = null;

    #[ORM\ManyToOne(inversedBy: 'fdb')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    /**
     * @var Collection<int, Detail>
     */

    #[ORM\OneToMany(targetEntity: Detail::class, mappedBy: 'fdb')]
    private Collection $details;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'fdbs')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Caisse $caisse = null;

    #[ORM\Column(length: 255)]
    private ?string $uuid = null;

//    #[ORM\Column]
//    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $total = null;

    /**
     * @var Collection<int, BonCaisse>
     */

    #[ORM\OneToMany(targetEntity: BonCaisse::class, mappedBy: 'fdb')]
    private Collection $bonCaisses;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $beneficiaire = null;

    #[ORM\ManyToOne(inversedBy: 'fdbs')]
    private ?Expense $expense = null;

    #[ORM\ManyToOne(inversedBy: 'fdbs')]
    private ?TypeExpense $typeExpense = null;

    #[ORM\ManyToOne(inversedBy: 'fdb')]
    private ?Emeteur $emeteur = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isActive = true;

    #[ORM\ManyToOne(inversedBy: 'fdbs')]
    private ?Journee $journee = null;

    /**
     * @var Collection<int, JournalCaisse>
     */
    #[ORM\OneToMany(targetEntity: JournalCaisse::class, mappedBy: 'Fdb')]
    private Collection $journalCaisses;

//    #[ORM\Column(nullable: true)]
//    private ?bool $IsActive = null;



//    #[ORM\ManyToOne(inversedBy: 'fdbs')]
//    private ?JournalCaisse $JournalCaisse = null;

    public function __construct()
    {
        $this->details = new ArrayCollection();
        $this->bonCaisses = new ArrayCollection();
        $this->journalCaisses = new ArrayCollection();

    }

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

//    public function getDate(): ?\DateTimeImmutable
//    {
//        return $this->date;
//    }
//
//    public function setDate(\DateTimeImmutable $date): self
//    {
//        $this->date = $date;
//
//        return $this;
//    }


    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): static
    {
        $this->isActive = $isActive;

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
     * @return Collection<int, Detail>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(Detail $detail): static
    {
        if (!$this->details->contains($detail)) {
            $this->details->add($detail);
            $detail->setFdb($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): static
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getFdb() === $this) {
                $detail->setFdb(null);
            }
        }

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

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

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    #[ORM\PrePersist]
    public function setUuid(): static
    {
        $this->uuid = Uuid::v4();

        return $this;
    }

//    public function getCreatedAt(): ?\DateTimeImmutable
//    {
//        return $this->createdAt;
//    }
//
//    #[ORM\PrePersist]
//    public function setCreatedAt(): static
//    {
//        $this->createdAt = new \DateTimeImmutable();
//
//        return $this;
//    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(?string $total): static
    {
        $this->total = $total;

        return $this;
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
            $bonCaiss->setFdb($this);
        }

        return $this;
    }

    public function removeBonCaiss(BonCaisse $bonCaiss): static
    {
        if ($this->bonCaisses->removeElement($bonCaiss)) {
            // set the owning side to null (unless already changed)
            if ($bonCaiss->getFdb() === $this) {
                $bonCaiss->setFdb(null);
            }
        }

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;

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

//public function isActive(): ?bool
//{
//    return $this->IsActive;
//}
//
//public function setActive(?bool $IsActive): static
//{
//    $this->IsActive = $IsActive;
//
//    return $this;
//}

    public function getJournee(): ?Journee
    {
        return $this->journee;
    }

    public function setJournee(?Journee $journee): static
    {
        $this->journee = $journee;

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
            $journalCaiss->setFdb($this);
        }

        return $this;
    }

    public function removeJournalCaiss(JournalCaisse $journalCaiss): static
    {
        if ($this->journalCaisses->removeElement($journalCaiss)) {
            // set the owning side to null (unless already changed)
            if ($journalCaiss->getFdb() === $this) {
                $journalCaiss->setFdb(null);
            }
        }

        return $this;
    }

}
