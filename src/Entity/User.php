<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use FontLib\Table\Type\name;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
//#[ORM\HasLifecycleCallbacks]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USERNAME', fields: ['pseudo'])]
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
     * @var Collection<int, Depense>
     */
    #[ORM\OneToMany(targetEntity: Depense::class, mappedBy: 'user')]
    private Collection $depenses;

    /**
     * @var Collection<int, Bonapprovisionnement>
     */
    #[ORM\OneToMany(targetEntity: Bonapprovisionnement::class, mappedBy: 'user')]
    private Collection $bonapprovisionnements;

    #[ORM\Column(nullable: true)]
    private ?bool $isActive = true;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pseudo = null;

    #[ORM\OneToMany(targetEntity: Fdb::class, mappedBy: 'user')]
    private Collection $fdb;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resetToken;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fonction = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isTemporary = null;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Caisse $caisse = null;

    /**
     * @var Collection<int, Billetage>
     */
    #[ORM\OneToMany(targetEntity: Billetage::class, mappedBy: 'user')]
    private Collection $billetages;

    /**
     * @var Collection<int, ApproCaisse>
     */
    #[ORM\OneToMany(targetEntity: ApproCaisse::class, mappedBy: 'user')]
    private Collection $approCaisses;

    /**
     * @var Collection<int, Notification>
     */
    #[ORM\OneToMany(targetEntity: Notification::class, mappedBy: 'user')]
    private Collection $notifications;

    #[ORM\Column(nullable: true)]
    private ?bool $isResponsable = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Emeteur $emeteur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    /**
     * @var Collection<int, OrderMission>
     */
    #[ORM\OneToMany(targetEntity: OrderMission::class, mappedBy: 'user')]
    private Collection $orderMissions;

    /**
     * @var Collection<int, BonMission>
     */
    #[ORM\OneToMany(targetEntity: BonMission::class, mappedBy: 'user')]
    private Collection $bonMissions;

    /**
     * @var Collection<int, BackCash>
     */
    #[ORM\OneToMany(targetEntity: BackCash::class, mappedBy: 'user')]
    private Collection $backCashes;

    #[ORM\Column(nullable: true)]
    private ?bool $isCashier = null;

    public function __construct()
    {
        $this->depenses = new ArrayCollection();
        $this->bonapprovisionnements = new ArrayCollection();
        $this->billetages = new ArrayCollection();
        $this->approCaisses = new ArrayCollection();
        $this->notifications = new ArrayCollection();
        //        $this->users = new ArrayCollection();
        $this->orderMissions = new ArrayCollection();
        $this->bonMissions = new ArrayCollection();
        $this->backCashes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): static
    {
        $this->fullName = $fullName;

        return $this;
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
            $depense->setUser($this);
        }

        return $this;
    }

    public function removeDepense(Depense $depense): static
    {
        if ($this->depenses->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getUser() === $this) {
                $depense->setUser(null);
            }
        }

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
            $bonapprovisionnement->setUser($this);
        }

        return $this;
    }

    public function removeBonapprovisionnement(Bonapprovisionnement $bonapprovisionnement): static
    {
        if ($this->bonapprovisionnements->removeElement($bonapprovisionnement)) {
            // set the owning side to null (unless already changed)
            if ($bonapprovisionnement->getUser() === $this) {
                $bonapprovisionnement->setUser(null);
            }
        }

        return $this;
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

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getResetToken(): ?string
    {
        return $this->resetToken;
    }

    public function setResetToken(?string $resetToken): self
    {
        $this->resetToken = $resetToken;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): static
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function __toString()
    {
        return $this->fullName;
    }

    public function getIsTemporary(): ?bool
    {
        return $this->isTemporary;
    }

    public function setTemporary(?bool $isTemporary): static
    {
        $this->isTemporary = $isTemporary;

        return $this;
    }

    public function getCaisse(): ?Caisse
    {
        return $this->caisse;
    }

    public function setCaisse(?Caisse $caisse): static
    {
        // unset the owning side of the relation if necessary
        if ($caisse === null && $this->caisse !== null) {
            $this->caisse->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($caisse !== null && $caisse->getUser() !== $this) {
            $caisse->setUser($this);
        }

        $this->caisse = $caisse;

        return $this;
    }

    /**
     * @return Collection<int, Billetage>
     */
    public function getBilletages(): Collection
    {
        return $this->billetages;
    }

    public function addBilletage(Billetage $billetage): static
    {
        if (!$this->billetages->contains($billetage)) {
            $this->billetages->add($billetage);
            $billetage->setUser($this);
        }

        return $this;
    }

    public function removeBilletage(Billetage $billetage): static
    {
        if ($this->billetages->removeElement($billetage)) {
            // set the owning side to null (unless already changed)
            if ($billetage->getUser() === $this) {
                $billetage->setUser(null);
            }
        }

        return $this;
    }
    //
    //    /**
    //     * @ORM\PrePersist
    //     * @ORM\PreUpdate
    //     */
    //    public function generatePseudoIfEmpty(): void
    //    {
    //        if (empty($this->pseudo) && !empty($this->fullName)) {
    //            $this->pseudo = $this->createPseudoFromFullName($this->fullName);
    //        }
    //    }
    //
    //    private function createPseudoFromFullName(string $fullName): string
    //    {
    //        $pseudo = strtolower(trim($fullName));
    //        $pseudo = preg_replace('/\s+/', '-', $pseudo);
    //        $pseudo = iconv('UTF-8', 'ASCII//TRANSLIT', $pseudo);
    //        return $pseudo;
    //    }

    /**
     * @return Collection<int, ApproCaisse>
     */
    public function getApproCaisses(): Collection
    {
        return $this->approCaisses;
    }

    public function addApproCaiss(ApproCaisse $approCaiss): static
    {
        if (!$this->approCaisses->contains($approCaiss)) {
            $this->approCaisses->add($approCaiss);
            $approCaiss->setUser($this);
        }

        return $this;
    }

    public function removeApproCaiss(ApproCaisse $approCaiss): static
    {
        if ($this->approCaisses->removeElement($approCaiss)) {
            // set the owning side to null (unless already changed)
            if ($approCaiss->getUser() === $this) {
                $approCaiss->setUser(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection<int, Notification>
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notification $notification): static
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications->add($notification);
            $notification->setUser($this);
        }

        return $this;
    }

    public function removeNotification(Notification $notification): static
    {
        if ($this->notifications->removeElement($notification)) {
            // set the owning side to null (unless already changed)
            if ($notification->getUser() === $this) {
                $notification->setUser(null);
            }
        }

        return $this;
    }


    public function isResponsable(): ?bool
    {
        return $this->isResponsable;
    }

    public function setResponsable(?bool $isResponsable): static
    {
        $this->isResponsable = $isResponsable;

        return $this;
    }

    public function getEmeteur(): ?Emeteur
    {
        return $this->emeteur;
    }

    public function setEmeteur(?Emeteur $emeteur): static
    {
        $this->emeteur = $emeteur;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNomComplet(): string
    {
        return $this->prenom . ' ' . $this->fullName;
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
            $orderMission->setUser($this);
        }

        return $this;
    }

    public function removeOrderMission(OrderMission $orderMission): static
    {
        if ($this->orderMissions->removeElement($orderMission)) {
            // set the owning side to null (unless already changed)
            if ($orderMission->getUser() === $this) {
                $orderMission->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, BonMission>
     */
    public function getBonMissions(): Collection
    {
        return $this->bonMissions;
    }

    public function addBonMission(BonMission $bonMission): static
    {
        if (!$this->bonMissions->contains($bonMission)) {
            $this->bonMissions->add($bonMission);
            $bonMission->setUser($this);
        }

        return $this;
    }

    public function removeBonMission(BonMission $bonMission): static
    {
        if ($this->bonMissions->removeElement($bonMission)) {
            // set the owning side to null (unless already changed)
            if ($bonMission->getUser() === $this) {
                $bonMission->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, BackCash>
     */
    public function getBackCashes(): Collection
    {
        return $this->backCashes;
    }

    public function addBackCash(BackCash $backCash): static
    {
        if (!$this->backCashes->contains($backCash)) {
            $this->backCashes->add($backCash);
            $backCash->setUser($this);
        }

        return $this;
    }

    public function removeBackCash(BackCash $backCash): static
    {
        if ($this->backCashes->removeElement($backCash)) {
            // set the owning side to null (unless already changed)
            if ($backCash->getUser() === $this) {
                $backCash->setUser(null);
            }
        }

        return $this;
    }

    public function isCashier(): ?bool
    {
        return $this->isCashier;
    }

    public function setIsCashier(?bool $isCashier): static
    {
        $this->isCashier = $isCashier;

        return $this;
    }
}
