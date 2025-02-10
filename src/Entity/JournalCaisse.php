<?php

namespace App\Entity;

use App\Repository\JournalCaisseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: JournalCaisseRepository::class)]
class JournalCaisse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numPiece = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $intitule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $entree = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sortie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $solde = null;

    #[ORM\Column(type: 'uuid', nullable: true)]
    private ?Uuid $uuid = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'journalCaisses')]
    private ?Caisse $caisse = null;

    #[ORM\ManyToOne(inversedBy: 'journalCaisses')]
    private ?Fdb $Fdb = null;

    #[ORM\ManyToOne(inversedBy: 'journalCaisses')]
    private ?Bonapprovisionnement $Bonapprovisionnement = null;

    #[ORM\ManyToOne(inversedBy: 'journalCaisses')]
    private ?RecuCaisse $recuCaisse = null;

    #[ORM\ManyToOne(inversedBy: 'journalCaisses')]
    private ?BonCaisse $bonCaisse = null;

    #[ORM\ManyToOne(inversedBy: 'journalCaisse')]
    private ?ApproCaisse $approCaisse = null;

    #[ORM\ManyToOne(inversedBy: 'journalCaisse')]
    private ?OrderMission $orderMission = null;

    #[ORM\ManyToOne(inversedBy: 'JournalCaisse')]
    private ?BonMission $bonMission = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libell�e = null;

    #[ORM\ManyToOne(inversedBy: 'journalCaisses')]
    private ?Detail $detail = null;

    #[ORM\ManyToOne(inversedBy: 'journalCaisses')]
    private ?BackCash $backClash = null;

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

    public function getNumPiece(): ?string
    {
        return $this->numPiece;
    }

    public function setNumPiece(?string $numPiece): static
    {
        $this->numPiece = $numPiece;

        return $this;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(?string $intitule): static
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getEntree(): ?string
    {
        return $this->entree;
    }

    public function setEntree(?string $entree): static
    {
        $this->entree = $entree;

        return $this;
    }

    public function getSortie(): ?string
    {
        return $this->sortie;
    }

    public function setSortie(?string $sortie): static
    {
        $this->sortie = $sortie;

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

    public function getUuid(): ?Uuid
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

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

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

    public function getFdb(): ?Fdb
    {
        return $this->Fdb;
    }

    public function setFdb(?Fdb $Fdb): static
    {
        $this->Fdb = $Fdb;

        return $this;
    }

    public function getBonapprovisionnement(): ?Bonapprovisionnement
    {
        return $this->Bonapprovisionnement;
    }

    public function setBonapprovisionnement(?Bonapprovisionnement $Bonapprovisionnement): static
    {
        $this->Bonapprovisionnement = $Bonapprovisionnement;

        return $this;
    }

    public function getRecuCaisse(): ?RecuCaisse
    {
        return $this->recuCaisse;
    }

    public function setRecuCaisse(?RecuCaisse $recuCaisse): static
    {
        $this->recuCaisse = $recuCaisse;

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

    public function __toString(): string
    {
        return $this->intitule;
    }

    public function getApproCaisse(): ?ApproCaisse
    {
        return $this->approCaisse;
    }

    public function setApproCaisse(?ApproCaisse $approCaisse): static
    {
        $this->approCaisse = $approCaisse;

        return $this;
    }

    public function getOrderMission(): ?OrderMission
    {
        return $this->orderMission;
    }

    public function setOrderMission(?OrderMission $orderMission): static
    {
        $this->orderMission = $orderMission;

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

    public function getLibell�e(): ?string
    {
        return $this->libell�e;
    }

    public function setLibell�e(?string $libell�e): static
    {
        $this->libell�e = $libell�e;

        return $this;
    }

    public function getDetail(): ?Detail
    {
        return $this->detail;
    }

    public function setDetail(?Detail $detail): static
    {
        $this->detail = $detail;

        return $this;
    }

    public function getBackClash(): ?BackCash
    {
        return $this->backClash;
    }

    public function setBackClash(?BackCash $backClash): static
    {
        $this->backClash = $backClash;

        return $this;
    }

}
