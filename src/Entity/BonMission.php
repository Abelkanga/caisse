<?php

namespace App\Entity;

use App\Repository\BonMissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: BonMissionRepository::class)]
class BonMission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $montant = null;

    #[ORM\Column(type: 'uuid', nullable: true)]
    private ?Uuid $uuid = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $beneficiaire = null;

    #[ORM\ManyToOne(inversedBy: 'bonMissions')]
    private ?OrderMission $OrderMission = null;

    #[ORM\ManyToOne(inversedBy: 'bonMissions')]
    private ?Caisse $Caisse = null;

    /**
     * @var Collection<int, JournalCaisse>
     */
    #[ORM\OneToMany(targetEntity: JournalCaisse::class, mappedBy: 'bonMission')]
    private Collection $JournalCaisse;

    #[ORM\ManyToOne(inversedBy: 'BonMission')]
    private ?Produit $produit = null;

    /**
     * @var Collection<int, DetailBonMission>
     */
    #[ORM\OneToMany(targetEntity: DetailBonMission::class, mappedBy: 'bonMission')]
    private Collection $DetailBonMission;

//    #[ORM\Column(length: 255, nullable: true)]
//    private ?string $total = null;
    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $total = null;


    public function __construct()
    {
        $this->JournalCaisse = new ArrayCollection();
        $this->DetailBonMission = new ArrayCollection();
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

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(?string $montant): static
    {
        $this->montant = $montant;

        return $this;
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;

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

    public function getOrderMission(): ?OrderMission
    {
        return $this->OrderMission;
    }

    public function setOrderMission(?OrderMission $OrderMission): static
    {
        $this->OrderMission = $OrderMission;

        return $this;
    }

    public function getCaisse(): ?Caisse
    {
        return $this->Caisse;
    }

    public function setCaisse(?Caisse $Caisse): static
    {
        $this->Caisse = $Caisse;

        return $this;
    }

    /**
     * @return Collection<int, JournalCaisse>
     */
    public function getJournalCaisse(): Collection
    {
        return $this->JournalCaisse;
    }

    public function addJournalCaisse(JournalCaisse $journalCaisse): static
    {
        if (!$this->JournalCaisse->contains($journalCaisse)) {
            $this->JournalCaisse->add($journalCaisse);
            $journalCaisse->setBonMission($this);
        }

        return $this;
    }

    public function removeJournalCaisse(JournalCaisse $journalCaisse): static
    {
        if ($this->JournalCaisse->removeElement($journalCaisse)) {
            // set the owning side to null (unless already changed)
            if ($journalCaisse->getBonMission() === $this) {
                $journalCaisse->setBonMission(null);
            }
        }

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): static
    {
        $this->produit = $produit;

        return $this;
    }

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
            $detailBonMission->setBonMission($this);
        }

        return $this;
    }

    public function removeDetailBonMission(DetailBonMission $detailBonMission): static
    {
        if ($this->DetailBonMission->removeElement($detailBonMission)) {
            // set the owning side to null (unless already changed)
            if ($detailBonMission->getBonMission() === $this) {
                $detailBonMission->setBonMission(null);
            }
        }

        return $this;
    }

//    public function getTotal(): ?string
//    {
//        return $this->total;
//    }
//
//    public function setTotal(?string $total): static
//    {
//        $this->total = $total;
//
//        return $this;
//    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(?string $total): static
    {
        $this->total = $total;

        return $this;
    }

}
