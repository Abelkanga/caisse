<?php

namespace App\Entity;

use App\Repository\ApproCaisseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;


#[ORM\Entity(repositoryClass: ApproCaisseRepository::class)]
#[ORM\HasLifecycleCallbacks()]
class ApproCaisse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $montant = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'approCaisses')]
    private ?Journee $journee = null;

    // Nouvelle relation pour la caisse émettrice (caisse qui envoie l'argent)
    #[ORM\ManyToOne(targetEntity: Caisse::class, inversedBy: 'approCaissesEmettrices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Caisse $caisseEmettrice = null;

    // Nouvelle relation pour la caisse réceptrice (caisse qui reçoit l'argent)
    #[ORM\ManyToOne(targetEntity: Caisse::class, inversedBy: 'approCaissesReceptrices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Caisse $caisseReceptrice = null;

    #[ORM\ManyToOne(inversedBy: 'approCaisses')]
    private ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $objet = null;

    #[ORM\Column(type: 'string')]
    private ?string $uuid = null;

    /**
     * @var Collection<int, JournalCaisse>
     */
    #[ORM\OneToMany(targetEntity: JournalCaisse::class, mappedBy: 'approCaisse')]
    private Collection $journalCaisse;

    /**
     * @var Collection<int, Notification>
     */
    #[ORM\OneToMany(targetEntity: Notification::class, mappedBy: 'approcaisse')]
    private Collection $notifications;

    public function __construct()
    {
        $this->journalCaisse = new ArrayCollection();
        $this->notifications = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(?string $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getJournee(): ?Journee
    {
        return $this->journee;
    }

    public function setJournee(?Journee $journee): static
    {
        $this->journee = $journee;

        return $this;
    }

    public function getCaisseEmettrice(): ?Caisse
    {
        return $this->caisseEmettrice;
    }

    public function setCaisseEmettrice(?Caisse $caisseEmettrice): self
    {
        $this->caisseEmettrice = $caisseEmettrice;
        return $this;
    }

    public function getCaisseReceptrice(): ?Caisse
    {
        return $this->caisseReceptrice;
    }

    public function setCaisseReceptrice(?Caisse $caisseReceptrice): self
    {
        $this->caisseReceptrice = $caisseReceptrice;
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(?string $objet): static
    {
        $this->objet = $objet;

        return $this;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    #[ORM\PrePersist()]
    public function setUuid(): static
    {
        $this->uuid = Uuid::v4()->toBase32();

        return $this;
    }

    /**
     * @return Collection<int, JournalCaisse>
     */
    public function getJournalCaisse(): Collection
    {
        return $this->journalCaisse;
    }

    public function addJournalCaisse(JournalCaisse $journalCaisse): static
    {
        if (!$this->journalCaisse->contains($journalCaisse)) {
            $this->journalCaisse->add($journalCaisse);
            $journalCaisse->setApproCaisse($this);
        }

        return $this;
    }

    public function removeJournalCaisse(JournalCaisse $journalCaisse): static
    {
        if ($this->journalCaisse->removeElement($journalCaisse)) {
            // set the owning side to null (unless already changed)
            if ($journalCaisse->getApproCaisse() === $this) {
                $journalCaisse->setApproCaisse(null);
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
            $notification->setApprocaisse($this);
        }

        return $this;
    }

    public function removeNotification(Notification $notification): static
    {
        if ($this->notifications->removeElement($notification)) {
            // set the owning side to null (unless already changed)
            if ($notification->getApprocaisse() === $this) {
                $notification->setApprocaisse(null);
            }
        }

        return $this;
    }

}
