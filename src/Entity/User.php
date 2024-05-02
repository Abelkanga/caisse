<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 50)]
    private ?string $fullName = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    /**
     * @var Collection<int, Fdb>
     */
    #[ORM\OneToMany(targetEntity: Fdb::class, mappedBy: 'user')]
    private Collection $fdb;

    /**
     * @var Collection<int, Depense>
     */
    #[ORM\OneToMany(targetEntity: Depense::class, mappedBy: 'user')]
    private Collection $depense;

    /**
     * @var Collection<int, Caisse>
     */
    #[ORM\OneToMany(targetEntity: Caisse::class, mappedBy: 'user')]
    private Collection $caisse;

    public function __construct()
    {
        $this->fdb = new ArrayCollection();
        $this->depense = new ArrayCollection();
        $this->caisse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

     /**
     * Get the value of fullName
     *
     * @return ?string
     */


     public function setFullName(?string $fullName): self
     {
         $this->fullName = $fullName;
 
         return $this;
     }
 

     public function getFullName(): ?string
    {
        return $this->fullName;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }


    /**
     * Set the value of fullName
     *
     * @param ?string $fullName
     *
     * @return self
     */

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
            $fdb->setUser($this);
        }

        return $this;
    }

    public function removeFdb(Fdb $fdb): static
    {
        if ($this->fdb->removeElement($fdb)) {
            // set the owning side to null (unless already changed)
            if ($fdb->getUser() === $this) {
                $fdb->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Depense>
     */
    public function getDepense(): Collection
    {
        return $this->depense;
    }

    public function addDepense(Depense $depense): static
    {
        if (!$this->depense->contains($depense)) {
            $this->depense->add($depense);
            $depense->setUser($this);
        }

        return $this;
    }

    public function removeDepense(Depense $depense): static
    {
        if ($this->depense->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getUser() === $this) {
                $depense->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Caisse>
     */
    public function getCaisse(): Collection
    {
        return $this->caisse;
    }

    public function addCaisse(Caisse $caisse): static
    {
        if (!$this->caisse->contains($caisse)) {
            $this->caisse->add($caisse);
            $caisse->setUser($this);
        }

        return $this;
    }

    public function removeCaisse(Caisse $caisse): static
    {
        if ($this->caisse->removeElement($caisse)) {
            // set the owning side to null (unless already changed)
            if ($caisse->getUser() === $this) {
                $caisse->setUser(null);
            }
        }

        return $this;
    }
    
}
