<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: CityRepository::class)]
#[Broadcast]
class City
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    /**
     * @var Collection<int, DetailBonMission>
     */
    #[ORM\OneToMany(targetEntity: DetailBonMission::class, mappedBy: 'city')]
    private Collection $detailBonMission;

    /**
     * @var Collection<int, BonMission>
     */
    #[ORM\OneToMany(targetEntity: BonMission::class, mappedBy: 'city')]
    private Collection $bonMission;

    public function __construct()
    {
        $this->detailBonMission = new ArrayCollection();
        $this->bonMission = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): static
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, DetailBonMission>
     */
    public function getDetailBonMission(): Collection
    {
        return $this->detailBonMission;
    }

    public function addDetailBonMission(DetailBonMission $detailBonMission): static
    {
        if (!$this->detailBonMission->contains($detailBonMission)) {
            $this->detailBonMission->add($detailBonMission);
            $detailBonMission->setCity($this);
        }

        return $this;
    }

    public function removeDetailBonMission(DetailBonMission $detailBonMission): static
    {
        if ($this->detailBonMission->removeElement($detailBonMission)) {
            // set the owning side to null (unless already changed)
            if ($detailBonMission->getCity() === $this) {
                $detailBonMission->setCity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, BonMission>
     */
    public function getBonMission(): Collection
    {
        return $this->bonMission;
    }

    public function addBonMission(BonMission $bonMission): static
    {
        if (!$this->bonMission->contains($bonMission)) {
            $this->bonMission->add($bonMission);
            $bonMission->setCity($this);
        }

        return $this;
    }

    public function removeBonMission(BonMission $bonMission): static
    {
        if ($this->bonMission->removeElement($bonMission)) {
            // set the owning side to null (unless already changed)
            if ($bonMission->getCity() === $this) {
                $bonMission->setCity(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? ''; // Remplacez "nom" par la propriété que vous voulez afficher (par exemple, le nom ou une autre valeur textuelle).
    }
}
