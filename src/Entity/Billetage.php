<?php

namespace App\Entity;

use App\Repository\BilletageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BilletageRepository::class)]
class Billetage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $b10000 = null;

    #[ORM\Column(nullable: true)]
    private ?int $b5000 = null;

    #[ORM\Column(nullable: true)]
    private ?int $b2000 = null;

    #[ORM\Column(nullable: true)]
    private ?int $b1000 = null;

    #[ORM\Column(nullable: true)]
    private ?int $b500 = null;

    #[ORM\Column(nullable: true)]
    private ?int $m500 = null;

    #[ORM\Column(nullable: true)]
    private ?int $m250 = null;

    #[ORM\Column(nullable: true)]
    private ?int $m200 = null;

    #[ORM\Column(nullable: true)]
    private ?int $m100 = null;

    #[ORM\Column(nullable: true)]
    private ?int $m50 = null;

    #[ORM\Column(nullable: true)]
    private ?int $m10 = null;

    #[ORM\Column(nullable: true)]
    private ?int $m5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $balance = null;

    #[ORM\Column(nullable: true)]
    private ?int $amount = null;

    #[ORM\Column(nullable: true)]
    private ?int $ecart = null;
//
//    #[ORM\Column(nullable: true)]
//    private ?int $checkBalance = null;

//    #[ORM\Column(nullable: true)]
//    private ?int $checkAmount = null;
//
//    #[ORM\Column(nullable: true)]
//    private ?int $checkEcart = null;

    #[ORM\ManyToOne(inversedBy: 'billetages')]
    private ?Caisse $caisse = null;

    #[ORM\ManyToOne(inversedBy: 'billetages')]
    private ?Bonapprovisionnement $bonapprovisionnement = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $confimreAt = null;

    #[ORM\ManyToOne(inversedBy: 'billetages')]
    private ?User $user = null;

    #[ORM\OneToOne(inversedBy: 'billetage', cascade: ['persist', 'remove'])]
    private ?Journee $journee = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getB10000(): ?int
    {
        return $this->b10000;
    }

    public function setB10000(?int $b10000): static
    {
        $this->b10000 = $b10000;

        return $this;
    }

    public function getB5000(): ?int
    {
        return $this->b5000;
    }

    public function setB5000(?int $b5000): static
    {
        $this->b5000 = $b5000;

        return $this;
    }

    public function getB2000(): ?int
    {
        return $this->b2000;
    }

    public function setB2000(?int $b2000): static
    {
        $this->b2000 = $b2000;

        return $this;
    }

    public function getB1000(): ?int
    {
        return $this->b1000;
    }

    public function setB1000(?int $b1000): static
    {
        $this->b1000 = $b1000;

        return $this;
    }

    public function getB500(): ?int
    {
        return $this->b500;
    }

    public function setB500(?int $b500): static
    {
        $this->b500 = $b500;

        return $this;
    }

    public function getM500(): ?int
    {
        return $this->m500;
    }

    public function setM500(?int $m500): static
    {
        $this->m500 = $m500;

        return $this;
    }

    public function getM250(): ?int
    {
        return $this->m250;
    }

    public function setM250(?int $m250): static
    {
        $this->m250 = $m250;

        return $this;
    }

    public function getM200(): ?int
    {
        return $this->m200;
    }

    public function setM200(?int $m200): static
    {
        $this->m200 = $m200;

        return $this;
    }

    public function getM100(): ?int
    {
        return $this->m100;
    }

    public function setM100(?int $m100): static
    {
        $this->m100 = $m100;

        return $this;
    }

    public function getM50(): ?int
    {
        return $this->m50;
    }

    public function setM50(?int $m50): static
    {
        $this->m50 = $m50;

        return $this;
    }

    public function getM10(): ?int
    {
        return $this->m10;
    }

    public function setM10(?int $m10): static
    {
        $this->m10 = $m10;

        return $this;
    }

    public function getM5(): ?int
    {
        return $this->m5;
    }

    public function setM5(?int $m5): static
    {
        $this->m5 = $m5;

        return $this;
    }

    public function getBalance(): ?string
    {
        return $this->balance;
    }

    public function setBalance(?string $balance): static
    {
        $this->balance = $balance;

        return $this;
    }


    public function getEcart(): ?int
    {
        return $this->ecart;
    }

    public function setEcart(?int $ecart): static
    {
        $this->ecart = $ecart;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): static
    {
        $this->amount = $amount;

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


    public function getBonapprovisionnement(): ?Bonapprovisionnement
    {
        return $this->bonapprovisionnement;
    }

    public function setBonapprovisionnement(?Bonapprovisionnement $bonapprovisionnement): static
    {
        $this->bonapprovisionnement = $bonapprovisionnement;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

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

    public function getConfimreAt(): ?\DateTimeImmutable
    {
        return $this->confimreAt;
    }

    public function setConfimreAt(?\DateTimeImmutable $confimreAt): static
    {
        $this->confimreAt = $confimreAt;

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

    public function getJournee(): ?Journee
    {
        return $this->journee;
    }

    public function setJournee(?Journee $journee): static
    {
        $this->journee = $journee;

        return $this;
    }

}
