<?php

namespace App\Entity;

use App\Repository\ExpenseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpenseRepository::class)]
class Expense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'expenses')]
    private ?TypeExpense $typeExpense = null;

    /**
     * @var Collection<int, Depense>
     */
    #[ORM\OneToMany(targetEntity: Depense::class, mappedBy: 'expense')]
    private Collection $depenses;

    /**
     * @var Collection<int, Fdb>
     */
    #[ORM\OneToMany(targetEntity: Fdb::class, mappedBy: 'expense')]
    private Collection $fdbs;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $autre = null;

    public function __construct()
    {
        $this->depenses = new ArrayCollection();
        $this->fdbs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): static
    {
        $this->code = $code;

        return $this;
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

    public function getTypeExpense(): ?TypeExpense
    {
        return $this->typeExpense;
    }

    public function setTypeExpense(?TypeExpense $typeExpense): static
    {
        $this->typeExpense = $typeExpense;

        return $this;
    }

    /**
     * @return Collection<int, Depense>
     */
    public function getDepenses(): Collection
    {
        return $this->depenses;
    }

    public function addDepense(Depense $depense): static
    {
        if (!$this->depenses->contains($depense)) {
            $this->depenses->add($depense);
            $depense->setExpense($this);
        }

        return $this;
    }

    public function removeDepense(Depense $depense): static
    {
        if ($this->depenses->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getExpense() === $this) {
                $depense->setExpense(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Fdb>
     */
    public function getFdbs(): Collection
    {
        return $this->fdbs;
    }

    public function addFdb(Fdb $fdb): static
    {
        if (!$this->fdbs->contains($fdb)) {
            $this->fdbs->add($fdb);
            $fdb->setExpense($this);
        }

        return $this;
    }

    public function removeFdb(Fdb $fdb): static
    {
        if ($this->fdbs->removeElement($fdb)) {
            // set the owning side to null (unless already changed)
            if ($fdb->getExpense() === $this) {
                $fdb->setExpense(null);
            }
        }

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getAutre(): ?string
    {
        return $this->autre;
    }

    public function setAutre(?string $autre): static
    {
        $this->autre = $autre;

        return $this;
    }
}
