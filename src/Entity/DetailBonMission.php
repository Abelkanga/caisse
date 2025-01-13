<?php

namespace App\Entity;

use App\Repository\DetailBonMissionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailBonMissionRepository::class)]
class DetailBonMission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rubrique = null;

//    #[ORM\Column(length: 255, nullable: true)]
//    private ?string $quantite = null;

    #[ORM\Column]
    private ?int $quantite = null;

//    #[ORM\Column(length: 255, nullable: true)]
//    private ?string $price = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?int $montant = null;


//    #[ORM\Column(length: 255, nullable: true)]
//    private ?string $montant = null;

    #[ORM\ManyToOne(inversedBy: 'DetailBonMission')]
    private ?OrderMission $orderMission = null;

    #[ORM\ManyToOne(inversedBy: 'DetailBonMission')]
    private ?Produit $produit = null;

    #[ORM\ManyToOne(inversedBy: 'DetailBonMission')]
    private ?BonMission $bonMission = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRubrique(): ?string
    {
        return $this->rubrique;
    }

    public function setRubrique(?string $rubrique): static
    {
        $this->rubrique = $rubrique;

        return $this;
    }

//    public function getQuantite(): ?string
//    {
//        return $this->quantite;
//    }
//
//    public function setQuantite(?string $quantite): static
//    {
//        $this->quantite = $quantite;
//
//        return $this;
//    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

//    public function getPrice(): ?string
//    {
//        return $this->price;
//    }
//
//    public function setPrice(?string $price): static
//    {
//        $this->price = $price;
//
//        return $this;
//    }

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


//    public function getMontant(): ?string
//    {
//        return $this->montant;
//    }
//
//    public function setMontant(?string $montant): static
//    {
//        $this->montant = $montant;
//
//        return $this;
//    }

    public function getOrderMission(): ?OrderMission
    {
        return $this->orderMission;
    }

    public function setOrderMission(?OrderMission $orderMission): static
    {
        $this->orderMission = $orderMission;

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

    public function getBonMission(): ?BonMission
    {
        return $this->bonMission;
    }

    public function setBonMission(?BonMission $bonMission): static
    {
        $this->bonMission = $bonMission;

        return $this;
    }
}
