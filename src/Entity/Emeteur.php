<?php

namespace App\Entity;

use App\Repository\EmeteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmeteurRepository::class)]
class Emeteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    /**
     * @var Collection<int, Fdb>
     */
    #[ORM\OneToMany(targetEntity: Fdb::class, mappedBy: 'emeteur')]
    private Collection $fdb;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contact = null;

    /**
     * @var Collection<int, Bonapprovisionnement>
     */
    #[ORM\OneToMany(targetEntity: Bonapprovisionnement::class, mappedBy: 'emeteur')]
    private Collection $bonapprovisionnements;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'emeteur')]
    private Collection $users;

    /**
     * @var Collection<int, OrderMission>
     */
    #[ORM\OneToMany(targetEntity: OrderMission::class, mappedBy: 'emeteur')]
    private Collection $orderMissions;

    public function __construct()
    {
        $this->fdb = new ArrayCollection();
        $this->bonapprovisionnements = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->orderMissions = new ArrayCollection();
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
     * @return Collection<int, Fdb>
     */
    public function getFdb(): Collection
    {
        return $this->fdb;
    }

    public function addFdb(Fdb $fdb): static
    {
        if (!$this->fdb->contains($fdb)) {
            $this->fdb->add($fdb);
            $fdb->setEmeteur($this);
        }

        return $this;
    }

    public function removeFdb(Fdb $fdb): static
    {
        if ($this->fdb->removeElement($fdb)) {
            // set the owning side to null (unless already changed)
            if ($fdb->getEmeteur() === $this) {
                $fdb->setEmeteur(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): static
    {
        $this->contact = $contact;

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
            $bonapprovisionnement->setEmeteur($this);
        }

        return $this;
    }

    public function removeBonapprovisionnement(Bonapprovisionnement $bonapprovisionnement): static
    {
        if ($this->bonapprovisionnements->removeElement($bonapprovisionnement)) {
            // set the owning side to null (unless already changed)
            if ($bonapprovisionnement->getEmeteur() === $this) {
                $bonapprovisionnement->setEmeteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setEmeteur($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getEmeteur() === $this) {
                $user->setEmeteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, OrderMission>
     */
    public function getOrderMissions(): Collection
    {
        return $this->orderMissions;
    }

    public function addOrderMission(OrderMission $orderMission): static
    {
        if (!$this->orderMissions->contains($orderMission)) {
            $this->orderMissions->add($orderMission);
            $orderMission->setEmeteur($this);
        }

        return $this;
    }

    public function removeOrderMission(OrderMission $orderMission): static
    {
        if ($this->orderMissions->removeElement($orderMission)) {
            // set the owning side to null (unless already changed)
            if ($orderMission->getEmeteur() === $this) {
                $orderMission->setEmeteur(null);
            }
        }

        return $this;
    }


}
