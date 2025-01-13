<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $TypeProduit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle = null;

    /**
     * @var Collection<int, DetailBonMission>
     */
    #[ORM\OneToMany(targetEntity: DetailBonMission::class, mappedBy: 'produit')]
    private Collection $DetailBonMission;

    /**
     * @var Collection<int, BonMission>
     */
    #[ORM\OneToMany(targetEntity: BonMission::class, mappedBy: 'produit')]
    private Collection $BonMission;

    public function __construct()
    {
        $this->DetailBonMission = new ArrayCollection();
        $this->BonMission = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeProduit(): ?string
    {
        return $this->TypeProduit;
    }

    public function setTypeProduit(?string $TypeProduit): static
    {
        $this->TypeProduit = $TypeProduit;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): static
    {
        $this->libelle = $libelle;

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
            $detailBonMission->setProduit($this);
        }

        return $this;
    }

    public function removeDetailBonMission(DetailBonMission $detailBonMission): static
    {
        if ($this->DetailBonMission->removeElement($detailBonMission)) {
            // set the owning side to null (unless already changed)
            if ($detailBonMission->getProduit() === $this) {
                $detailBonMission->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, BonMission>
     */
    public function getBonMission(): Collection
    {
        return $this->BonMission;
    }

    public function addBonMission(BonMission $bonMission): static
    {
        if (!$this->BonMission->contains($bonMission)) {
            $this->BonMission->add($bonMission);
            $bonMission->setProduit($this);
        }

        return $this;
    }

    public function removeBonMission(BonMission $bonMission): static
    {
        if ($this->BonMission->removeElement($bonMission)) {
            // set the owning side to null (unless already changed)
            if ($bonMission->getProduit() === $this) {
                $bonMission->setProduit(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->libelle ?? ''; // Remplacez "nom" par la propriété que vous voulez afficher (par exemple, le nom ou une autre valeur textuelle).
    }


//    public function __toString(): string
//    {
//        return sprintf('%s (%s)', $this->libelle, $this->TypeProduit);
//        // Exemple : "Produit A (Type X)" ou personnalisez selon vos besoins.
//    }

}
