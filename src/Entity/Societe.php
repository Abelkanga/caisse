<?php

namespace App\Entity;

use App\Repository\SocieteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocieteRepository::class)]
class Societe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $RaisonSociale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?array $FormeJuridique = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Activite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $SiegeSociale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $AdressePostale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Pays = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $SiteInternet = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CodeCommerce = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NumeroCompteContribuable = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $RegimeFiscale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NumeroTeleDeclarant = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $Forme = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $SiegeSocial = null;

    #[ORM\ManyToOne(inversedBy: 'societes')]
    private ?Fonction $fonction = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $manager = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->RaisonSociale;
    }

    public function setRaisonSociale(?string $RaisonSociale): static
    {
        $this->RaisonSociale = $RaisonSociale;

        return $this;
    }

    public function getFormeJuridique(): ?string
    {
        return $this->FormeJuridique;
    }

    public function setFormeJuridique(?string $FormeJuridique): static
    {
        $this->FormeJuridique = $FormeJuridique;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->Activite;
    }

    public function setActivite(?string $Activite): static
    {
        $this->Activite = $Activite;

        return $this;
    }

    public function getSiegeSociale(): ?string
    {
        return $this->SiegeSociale;
    }

    public function setSiegeSociale(?string $SiegeSociale): static
    {
        $this->SiegeSociale = $SiegeSociale;

        return $this;
    }

    public function getAdressePostale(): ?string
    {
        return $this->AdressePostale;
    }

    public function setAdressePostale(?string $AdressePostale): static
    {
        $this->AdressePostale = $AdressePostale;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(?string $Ville): static
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(?string $Pays): static
    {
        $this->Pays = $Pays;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(?string $Telephone): static
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getSiteInternet(): ?string
    {
        return $this->SiteInternet;
    }

    public function setSiteInternet(?string $SiteInternet): static
    {
        $this->SiteInternet = $SiteInternet;

        return $this;
    }

    public function getCodeCommerce(): ?string
    {
        return $this->CodeCommerce;
    }

    public function setCodeCommerce(?string $CodeCommerce): static
    {
        $this->CodeCommerce = $CodeCommerce;

        return $this;
    }

    public function getNumeroCompteContribuable(): ?string
    {
        return $this->NumeroCompteContribuable;
    }

    public function setNumeroCompteContribuable(?string $NumeroCompteContribuable): static
    {
        $this->NumeroCompteContribuable = $NumeroCompteContribuable;

        return $this;
    }

    public function getRegimeFiscale(): ?string
    {
        return $this->RegimeFiscale;
    }

    public function setRegimeFiscale(?string $RegimeFiscale): static
    {
        $this->RegimeFiscale = $RegimeFiscale;

        return $this;
    }

    public function getNumeroTeleDeclarant(): ?string
    {
        return $this->NumeroTeleDeclarant;
    }

    public function setNumeroTeleDeclarant(?string $NumeroTeleDeclarant): static
    {
        $this->NumeroTeleDeclarant = $NumeroTeleDeclarant;

        return $this;
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

    public function getForme(): ?array
    {
        return $this->Forme;
    }

    public function setForme(?array $Forme): static
    {
        $this->Forme = $Forme;

        return $this;
    }

    public function getSiegeSocial(): ?string
    {
        return $this->SiegeSocial;
    }

    public function setSiegeSocial(?string $SiegeSocial): static
    {
        $this->SiegeSocial = $SiegeSocial;

        return $this;
    }

    public function getFonction(): ?Fonction
    {
        return $this->fonction;
    }

    public function setFonction(?Fonction $fonction): static
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getManager(): ?string
    {
        return $this->manager;
    }

    public function setManager(?string $manager): static
    {
        $this->manager = $manager;

        return $this;
    }
}
