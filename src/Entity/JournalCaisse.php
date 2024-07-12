<?php

namespace App\Entity;

use App\Repository\JournalCaisseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

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

    /**
     * @var Collection<int, Caisse>
     */

    #[ORM\OneToMany(targetEntity: Caisse::class, mappedBy: 'JournalCaisse')]
    private Collection $caisses;
    /**
     * @var Collection<int, Bonapprovisionnement>
     */
    #[ORM\OneToMany(targetEntity: Bonapprovisionnement::class, mappedBy: 'JournalCaisse')]
    private Collection $bonapprovisionnements;

//    /**
//     * @var Collection<int, Fdb>
//     */
//    #[ORM\OneToMany(targetEntity: Fdb::class, mappedBy: 'JournalCaisse')]
//    private Collection $fdbs;

    public function __construct()
    {
        $this->caisses = new ArrayCollection();
        $this->fdbs = new ArrayCollection();
        $this->bonapprovisionnements = new ArrayCollection();
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

    /**
     * @return Collection<int, Caisse>
     */
    public function getCaisses(): Collection
    {
        return $this->caisses;
    }

    public function addCaiss(Caisse $caiss): static
    {
        if (!$this->caisses->contains($caiss)) {
            $this->caisses->add($caiss);
            $caiss->setJournalCaisse($this);
        }

        return $this;
    }

    public function removeCaiss(Caisse $caiss): static
    {
        if ($this->caisses->removeElement($caiss)) {
            // set the owning side to null (unless already changed)
            if ($caiss->getJournalCaisse() === $this) {
                $caiss->setJournalCaisse(null);
            }
        }

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
            $bonapprovisionnement->setJournalCaisse($this);
        }

        return $this;
    }

    public function removeBonapprovisionnement(Bonapprovisionnement $bonapprovisionnement): static
    {
        if ($this->bonapprovisionnements->removeElement($bonapprovisionnement)) {
            // set the owning side to null (unless already changed)
            if ($bonapprovisionnement->getJournalCaisse() === $this) {
                $bonapprovisionnement->setJournalCaisse(null);
            }
        }

        return $this;
    }

//    /**
//     * @return Collection<int, Fdb>
//     */
//    public function getFdbs(): Collection
//    {
//        return $this->fdbs;
//    }
//
//    public function addFdb(Fdb $fdb): static
//    {
//        if (!$this->fdbs->contains($fdb)) {
//            $this->fdbs->add($fdb);
//            $fdb->setJournalCaisse($this);
//        }
//
//        return $this;
//    }
//
//    public function removeFdb(Fdb $fdb): static
//    {
//        if ($this->fdbs->removeElement($fdb)) {
//            // set the owning side to null (unless already changed)
//            if ($fdb->getJournalCaisse() === $this) {
//                $fdb->setJournalCaisse(null);
//            }
//        }
//
//        return $this;
//    }
}
