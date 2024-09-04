<?php

namespace App\Entity;

use App\Repository\BonapprovisionnementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: BonapprovisionnementRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Bonapprovisionnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column(length: 255)]
    private ?string $modepaie = null;

    #[ORM\Column]
    private ?float $montanttotal = null;

    #[ORM\ManyToOne(inversedBy: 'bonapprovisionnements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'bonapprovisionnements')]
    private ?Caisse $caisse = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $uuid = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    /**
     * @var Collection<int, BonCaisse>
     */
    #[ORM\OneToMany(targetEntity: BonCaisse::class, mappedBy: 'bonapprovisionnement')]
    private Collection $bonCaisses;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    /**
     * @var Collection<int, Billetage>
     */
    #[ORM\OneToMany(targetEntity: Billetage::class, mappedBy: 'bonapprovisionnement')]
    private Collection $billetages;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $porteur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $destinataire = null;

    #[ORM\ManyToOne(inversedBy: 'bonapprovisionnements')]
    private ?Emeteur $emeteur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CheckNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomBanque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomCaisse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NumeroBon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomTiers = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Echeance = null;

    #[ORM\ManyToOne(inversedBy: 'bonapprovisionnements')]
    private ?Banque $banque = null;

    #[ORM\ManyToOne(inversedBy: 'bonapprovisionnements')]
    private ?Tiers $tiers = null;

//    #[ORM\ManyToOne(inversedBy: 'bonapprovisionnements')]
//    private ?JournalCaisse $JournalCaisse = null;

    #[ORM\ManyToOne(inversedBy: 'bonapprovisionnements')]
    private ?Journee $journee = null;

    /**
     * @var Collection<int, RecuCaisse>
     */
    #[ORM\OneToMany(targetEntity: RecuCaisse::class, mappedBy: 'bonapprovisionnement')]
    private Collection $recuCaisses;

    /**
     * @var Collection<int, JournalCaisse>
     */
    #[ORM\OneToMany(targetEntity: JournalCaisse::class, mappedBy: 'Bonapprovisionnement')]
    private Collection $journalCaisses;


    public function __construct()
    {
        $this->bonCaisses = new ArrayCollection();
        $this->date = new \DateTimeImmutable();
        $this->billetages = new ArrayCollection();
        $this->recuCaisses = new ArrayCollection();
        $this->journalCaisses = new ArrayCollection();

    }

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
        return $this->modepaie;
    }

    public function setModepaie(string $modepaie): static
    {
        $this->modepaie = $modepaie;

        return $this;
    }

    public function getMontanttotal(): ?float
    {
        return $this->montanttotal;
    }

    public function setMontanttotal(float $montanttotal): static
    {
        $this->montanttotal = $montanttotal;

        return $this;
    }

//    public function getNature(): ?string
//    {
//        return $this->nature;
//    }
//
//    public function setNature(string $nature): static
//    {
//        $this->nature = $nature;
//
//        return $this;
//    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

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
    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAt(): static
    {
        $this->createdAt = new \DateTimeImmutable;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

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
            $bonCaiss->setBonapprovisionnement($this);
        }

        return $this;
    }

    public function removeBonCaiss(BonCaisse $bonCaiss): static
    {
        if ($this->bonCaisses->removeElement($bonCaiss)) {
            // set the owning side to null (unless already changed)
            if ($bonCaiss->getBonapprovisionnement() === $this) {
                $bonCaiss->setBonapprovisionnement(null);
            }
        }

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
            $billetage->setBonapprovisionnement($this);
        }

        return $this;
    }

    public function removeBilletage(Billetage $billetage): static
    {
        if ($this->billetages->removeElement($billetage)) {
            // set the owning side to null (unless already changed)
            if ($billetage->getBonapprovisionnement() === $this) {
                $billetage->setBonapprovisionnement(null);
            }
        }

        return $this;
    }

    public function getPorteur(): ?string
    {
        return $this->porteur;
    }

    public function setPorteur(?string $porteur): static
    {
        $this->porteur = $porteur;

        return $this;
    }

    public function getDestinataire(): ?string
    {
        return $this->destinataire;
    }

    public function setDestinataire(?string $destinataire): static
    {
        $this->destinataire = $destinataire;

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

    public function getCheckNumber(): ?string
    {
        return $this->CheckNumber;
    }

    public function setCheckNumber(?string $CheckNumber): static
    {
        $this->CheckNumber = $CheckNumber;

        return $this;
    }

    public function getNomBanque(): ?string
    {
        return $this->NomBanque;
    }

    public function setNomBanque(?string $NomBanque): static
    {
        $this->NomBanque = $NomBanque;

        return $this;
    }

    public function getNomCaisse(): ?string
    {
        return $this->NomCaisse;
    }

    public function setNomCaisse(?string $NomCaisse): static
    {
        $this->NomCaisse = $NomCaisse;

        return $this;
    }

    public function getNumeroBon(): ?string
    {
        return $this->NumeroBon;
    }

    public function setNumeroBon(?string $NumeroBon): static
    {
        $this->NumeroBon = $NumeroBon;

        return $this;
    }

    public function getNomTiers(): ?string
    {
        return $this->NomTiers;
    }

    public function setNomTiers(?string $NomTiers): static
    {
        $this->NomTiers = $NomTiers;

        return $this;
    }

    public function getEcheance(): ?\DateTimeInterface
    {
        return $this->Echeance;
    }

    public function setEcheance(?\DateTimeInterface $Echeance): static
    {
        $this->Echeance = $Echeance;

        return $this;
    }

    public function getBanque(): ?Banque
    {
        return $this->banque;
    }

    public function setBanque(?Banque $banque): static
    {
        $this->banque = $banque;

        return $this;
    }

    public function getTiers(): ?Tiers
    {
        return $this->tiers;
    }

    public function setTiers(?Tiers $tiers): static
    {
        $this->tiers = $tiers;

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
            $recuCaiss->setBonapprovisionnement($this);
        }

        return $this;
    }

    public function removeRecuCaiss(RecuCaisse $recuCaiss): static
    {
        if ($this->recuCaisses->removeElement($recuCaiss)) {
            // set the owning side to null (unless already changed)
            if ($recuCaiss->getBonapprovisionnement() === $this) {
                $recuCaiss->setBonapprovisionnement(null);
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
            $journalCaiss->setBonapprovisionnement($this);
        }

        return $this;
    }

    public function removeJournalCaiss(JournalCaisse $journalCaiss): static
    {
        if ($this->journalCaisses->removeElement($journalCaiss)) {
            // set the owning side to null (unless already changed)
            if ($journalCaiss->getBonapprovisionnement() === $this) {
                $journalCaiss->setBonapprovisionnement(null);
            }
        }

        return $this;
    }


}
