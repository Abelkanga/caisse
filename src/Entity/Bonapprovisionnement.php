<?php

namespace App\Entity;

use App\Repository\BonapprovisionnementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: BonapprovisionnementRepository::class)]
#[ORM\HasLifecycleCallbacks]
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
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'bonapprovisionnements')]
    private ?Caisse $caisse = null;

    /**
     * @var Collection<int, Detail>
     */
//    #[ORM\OneToMany(targetEntity: Detail::class, mappedBy: 'bonapprovisionnement')]
//    private Collection $details;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $uuid = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

//    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
//    private ?string $total = null;

    /**
     * @var Collection<int, BonCaisse>
     */
    #[ORM\OneToMany(targetEntity: BonCaisse::class, mappedBy: 'bonapprovisionnement')]
    private Collection $bonCaisses;

//    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
//    private ?string $total = null;


    public function __construct()
    {
        $this->details = new ArrayCollection();
        $this->bonCaisses = new ArrayCollection();
        $this->date = new \DateTimeImmutable();
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

//    /**
//     * @return Collection<int, Detail>
//     */
//    public function getDetails(): Collection
//    {
//        return $this->details;
//    }
//
//    public function addDetail(Detail $detail): static
//    {
//        if (!$this->details->contains($detail)) {
//            $this->details->add($detail);
//            $detail->setBonapprovisionnement($this);
//        }
//
//        return $this;
//    }
//
//    public function removeDetail(Detail $detail): static
//    {
//        if ($this->details->removeElement($detail)) {
//            // set the owning side to null (unless already changed)
//            if ($detail->getBonapprovisionnement() === $this) {
//                $detail->setBonapprovisionnement(null);
//            }
//        }
//
//        return $this;
//    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    #[ORM\PrePersist]
    public function setUuid(): static
    {
        $this->uuid = Uuid::v4();

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAt(): static
    {
        $this->createdAt = new \DateTimeImmutable;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

//    public function getTotal(): ?string
//    {
//        return $this->total;
//    }
//
//    public function setTotal(?string $total): static
//    {
//        $this->total = $total;
//
//        return $this;
//    }

    /**
     * @return Collection<int, BonCaisse>
     */
    public function getBonCaisses(): Collection
    {
        return $this->bonCaisses;
    }

    public function addBonCaiss(BonCaisse $bonCaiss): static
    {
        if (!$this->bonCaisses->contains($bonCaiss)) {
            $this->bonCaisses->add($bonCaiss);
            $bonCaiss->setBonapprovisionnement($this);
        }

        return $this;
    }

    public function removeBonCaiss(BonCaisse $bonCaiss): static
    {
        if ($this->bonCaisses->removeElement($bonCaiss)) {
            // set the owning side to null (unless already changed)
            if ($bonCaiss->getBonapprovisionnement() === $this) {
                $bonCaiss->setBonapprovisionnement(null);
            }
        }

        return $this;
    }

//    public function getTotal(): ?string
//    {
//        return $this->total;
//    }
//
//    public function setTotal(?string $total): static
//    {
//        $this->total = $total;
//
//        return $this;
//    }

}
