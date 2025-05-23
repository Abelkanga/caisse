<?php

namespace App\Entity;

use App\Repository\DetailRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailRepository::class)]
class Detail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designationproduit = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?int $montant = null;

//    #[ORM\ManyToOne(inversedBy: 'details')]
//    private ?Fdb $fdb = null;

    #[ORM\ManyToOne(targetEntity: Fdb::class, inversedBy: 'details')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private ?Fdb $fdb = null;

    #[ORM\ManyToOne(inversedBy: 'details')]
    private ?Depense $depense = null;

    /**
     * @var Collection<int, JournalCaisse>
     */
    #[ORM\OneToMany(targetEntity: JournalCaisse::class, mappedBy: 'detail')]
    private Collection $journalCaisses;

    public function __construct()
    {
        $this->journalCaisses = new ArrayCollection();
    }

//    #[ORM\ManyToOne(inversedBy: 'detail')]
//    private ?OrderMission $orderMission = null;


//    #[ORM\ManyToOne(inversedBy: 'details')]
//    private ?Bonapprovisionnement $bonapprovisionnement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignationproduit(): ?string
    {
        return $this->designationproduit;
    }

    public function setDesignationproduit(string $designationproduit): static
    {
        $this->designationproduit = $designationproduit;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): static
    {
        $this->montant = $montant;

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

//    public function getBonapprovisionnement(): ?Bonapprovisionnement
//    {
//        return $this->bonapprovisionnement;
//    }
//
//    public function setBonapprovisionnement(?Bonapprovisionnement $bonapprovisionnement): static
//    {
//        $this->bonapprovisionnement = $bonapprovisionnement;
//
//        return $this;
//    }

//public function getOrderMission(): ?OrderMission
//{
//    return $this->orderMission;
//}
//
//public function setOrderMission(?OrderMission $orderMission): static
//{
//    $this->orderMission = $orderMission;
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
        $journalCaiss->setDetail($this);
    }

    return $this;
}

public function removeJournalCaiss(JournalCaisse $journalCaiss): static
{
    if ($this->journalCaisses->removeElement($journalCaiss)) {
        // set the owning side to null (unless already changed)
        if ($journalCaiss->getDetail() === $this) {
            $journalCaiss->setDetail(null);
        }
    }

    return $this;
}


}
