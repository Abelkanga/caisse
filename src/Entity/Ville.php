<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VilleRepository::class)]
class Ville
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    /**
     * @var Collection<int, BonMission>
     */
    #[ORM\OneToMany(targetEntity: BonMission::class, mappedBy: 'ville')]
    private Collection $bonMission;

    public function __construct()
    {
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
            $bonMission->setVille($this);
        }

        return $this;
    }

    public function removeBonMission(BonMission $bonMission): static
    {
        if ($this->bonMission->removeElement($bonMission)) {
            // set the owning side to null (unless already changed)
            if ($bonMission->getVille() === $this) {
                $bonMission->setVille(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? ''; // Remplacez "nom" par la propriété que vous voulez afficher (par exemple, le nom ou une autre valeur textuelle).
    }
}
