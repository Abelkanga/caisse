<?php

namespace App\Entity;

use App\Repository\RecuCaisseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: RecuCaisseRepository::class)]
class RecuCaisse
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

    #[ORM\ManyToOne(inversedBy: 'recuCaisses')]
    private ?Caisse $caisse = null;

    #[ORM\ManyToOne(inversedBy: 'recuCaisses')]
    private ?Bonapprovisionnement $bonapprovisionnement = null;

    /**
     * @var Collection<int, JournalCaisse>
     */
    #[ORM\OneToMany(targetEntity: JournalCaisse::class, mappedBy: 'recuCaisse')]
    private Collection $journalCaisses;

    public function __construct()
    {
        $this->journalCaisses = new ArrayCollection();
    }

//    #[ORM\ManyToOne(inversedBy: 'recuCaisse')]
//    private ?JournalCaisse $journalCaisse = null;

//    #[ORM\Column(length: 255, nullable: true)]
//    private ?string $code = null;

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

    public function getCaisse(): ?Caisse
    {
        return $this->caisse;
    }

    public function setCaisse(?Caisse $caisse): static
    {
        $this->caisse = $caisse;

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

//    public function getCode(): ?string
//    {
//        return $this->code;
//    }
//
//    public function setCode(?string $code): static
//    {
//        $this->code = $code;
//
//        return $this;
//    }

//public function getJournalCaisse(): ?JournalCaisse
//{
//    return $this->journalCaisse;
//}
//
//public function setJournalCaisse(?JournalCaisse $journalCaisse): static
//{
//    $this->journalCaisse = $journalCaisse;
//
//    return $this;
//}

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
        $journalCaiss->setRecuCaisse($this);
    }

    return $this;
}

public function removeJournalCaiss(JournalCaisse $journalCaiss): static
{
    if ($this->journalCaisses->removeElement($journalCaiss)) {
        // set the owning side to null (unless already changed)
        if ($journalCaiss->getRecuCaisse() === $this) {
            $journalCaiss->setRecuCaisse(null);
        }
    }

    return $this;
}
}
