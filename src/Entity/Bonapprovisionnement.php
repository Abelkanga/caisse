<?php

namespace App\Entity;

use App\Repository\BonapprovisionnementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BonapprovisionnementRepository::class)]
class Bonapprovisionnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column(length: 255)]
    private ?string $modepaie = null;

    #[ORM\Column]
    private ?float $montanttotal = null;

    #[ORM\Column(length: 255)]
    private ?string $nature = null;

    #[ORM\ManyToOne(inversedBy: 'bonapprovisionnements')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'bonapprovisionnements')]
    private ?Caisse $caisse = null;

    /**
     * @var Collection<int, Detail>
     */
    #[ORM\OneToMany(targetEntity: Detail::class, mappedBy: 'bonapprovisionnement')]
    private Collection $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getModepaie(): ?string
    {
        return $this->modepaie;
    }

    public function setModepaie(string $modepaie): static
    {
        $this->modepaie = $modepaie;

        return $this;
    }

    public function getMontanttotal(): ?float
    {
        return $this->montanttotal;
    }

    public function setMontanttotal(float $montanttotal): static
    {
        $this->montanttotal = $montanttotal;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature): static
    {
        $this->nature = $nature;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

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

    /**
     * @return Collection<int, Detail>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(Detail $detail): static
    {
        if (!$this->details->contains($detail)) {
            $this->details->add($detail);
            $detail->setBonapprovisionnement($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): static
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getBonapprovisionnement() === $this) {
                $detail->setBonapprovisionnement(null);
            }
        }

        return $this;
    }
}
