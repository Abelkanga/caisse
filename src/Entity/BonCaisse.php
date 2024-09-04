<?php

namespace App\Entity;

use App\Repository\BonCaisseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'bonCaisses')]
    private ?Caisse $caisse = null;

    #[ORM\ManyToOne(inversedBy: 'bonCaisses')]
    private ?Fdb $fdb = null;

    #[ORM\ManyToOne(inversedBy: 'bonCaisses')]
    private ?Depense $depense = null;

    #[ORM\ManyToOne(inversedBy: 'bonCaisses')]
    private ?Bonapprovisionnement $bonapprovisionnement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $beneficiaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    /**
     * @var Collection<int, JournalCaisse>
     */
    #[ORM\OneToMany(targetEntity: JournalCaisse::class, mappedBy: 'bonCaisse')]
    private Collection $journalCaisses;

//    #[ORM\ManyToOne(inversedBy: 'bonCaisse')]
//    private ?JournalCaisse $journalCaisse = null;


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

    public function getFdb(): ?Fdb
    {
        return $this->fdb;
    }

    public function setFdb(?Fdb $fdb): static
    {
        $this->fdb = $fdb;

        return $this;
    }

    public function getDepense(): ?Depense
    {
        return $this->depense;
    }

    public function setDepense(?Depense $depense): static
    {
        $this->depense = $depense;

        return $this;
    }

    public function getBonapprovisionnement(): ?Bonapprovisionnement
    {
        return $this->bonapprovisionnement;
    }

    public function setBonapprovisionnement(?Bonapprovisionnement $bonapprovisionnement): static
    {
        $this->bonapprovisionnement = $bonapprovisionnement;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

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


    public function __construct()
    {
        // Générer automatiquement un UUID lors de la création d'un bon de caisse
        $this->uuid = Uuid::v4();  // Génération d'un UUID v4
        $this->journalCaisses = new ArrayCollection();
    }

//    public function getJournalCaisse(): ?JournalCaisse
//    {
//        return $this->journalCaisse;
//    }
//
//    public function setJournalCaisse(?JournalCaisse $journalCaisse): static
//    {
//        $this->journalCaisse = $journalCaisse;
//
//        return $this;
//    }

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
            $journalCaiss->setBonCaisse($this);
        }

        return $this;
    }

    public function removeJournalCaiss(JournalCaisse $journalCaiss): static
    {
        if ($this->journalCaisses->removeElement($journalCaiss)) {
            // set the owning side to null (unless already changed)
            if ($journalCaiss->getBonCaisse() === $this) {
                $journalCaiss->setBonCaisse(null);
            }
        }

        return $this;
    }

}
