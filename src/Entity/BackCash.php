<?php

namespace App\Entity;

use App\Repository\BackCashRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BackCashRepository::class)]
class BackCash
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    #[ORM\Column(nullable: true)]
    private ?int $montant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'backCashes')]
    private ?Caisse $caisse = null;

    #[ORM\ManyToOne(inversedBy: 'backCashes')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'backCashes')]
    private ?BonMission $bonMission = null;

    #[ORM\ManyToOne(inversedBy: 'backCashes')]
    private ?BonCaisse $bonCaisse = null;

    #[ORM\Column(nullable: true)]
    private ?int $montantRetour = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeDepense = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $referenceDepense = null;

    /**
     * @var Collection<int, JournalCaisse>
     */
    #[ORM\OneToMany(targetEntity: JournalCaisse::class, mappedBy: 'backClash')]
    private Collection $journalCaisses;

    public function __construct()
    {
        $this->journalCaisses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(?int $montant): static
    {
        $this->montant = $montant;

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

    public function getCaisse(): ?Caisse
    {
        return $this->caisse;
    }

    public function setCaisse(?Caisse $caisse): static
    {
        $this->caisse = $caisse;

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

    public function getBonMission(): ?BonMission
    {
        return $this->bonMission;
    }

    public function setBonMission(?BonMission $bonMission): static
    {
        $this->bonMission = $bonMission;

        return $this;
    }

    public function getBonCaisse(): ?BonCaisse
    {
        return $this->bonCaisse;
    }

    public function setBonCaisse(?BonCaisse $bonCaisse): static
    {
        $this->bonCaisse = $bonCaisse;

        return $this;
    }

    public function getMontantRetour(): ?int
    {
        return $this->montantRetour;
    }

    public function setMontantRetour(?int $montantRetour): static
    {
        $this->montantRetour = $montantRetour;

        return $this;
    }

    public function getTypeDepense(): ?string
    {
        return $this->typeDepense;
    }

    public function setTypeDepense(?string $typeDepense): static
    {
        $this->typeDepense = $typeDepense;

        return $this;
    }

    public function getReferenceDepense(): ?string
    {
        return $this->referenceDepense;
    }

    public function setReferenceDepense(?string $referenceDepense): static
    {
        $this->referenceDepense = $referenceDepense;

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
            $journalCaiss->setBackClash($this);
        }

        return $this;
    }

    public function removeJournalCaiss(JournalCaisse $journalCaiss): static
    {
        if ($this->journalCaisses->removeElement($journalCaiss)) {
            // set the owning side to null (unless already changed)
            if ($journalCaiss->getBackClash() === $this) {
                $journalCaiss->setBackClash(null);
            }
        }

        return $this;
    }
}
