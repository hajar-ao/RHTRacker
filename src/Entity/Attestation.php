<?php

namespace App\Entity;

use App\Repository\AttestationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttestationRepository::class)]
class Attestation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $TypeAttestation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateDemmande = null;

    #[ORM\Column]
    private ?bool $Statue = null;

    #[ORM\ManyToOne(inversedBy: 'Attestation')]
    private ?Employe $employe = null;

    #[ORM\ManyToOne(inversedBy: 'Attestation')]
    private ?User $user = null;
    public function __construct()
    {
        $this->DateDemmande = new \DateTime('now');
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeAttestation(): ?string
    {
        return $this->TypeAttestation;
    }

    public function setTypeAttestation(string $TypeAttestation): self
    {
        $this->TypeAttestation = $TypeAttestation;

        return $this;
    }

    public function getDateDemmande(): ?\DateTimeInterface
    {
        return $this->DateDemmande;
    }

    public function setDateDemmande(\DateTimeInterface $DateDemmande): self
    {
        $this->DateDemmande = $DateDemmande;

        return $this;
    }

    public function isStatue(): ?bool
    {
        return $this->Statue;
    }

    public function setStatue(bool $Statue): self
    {
        $this->Statue = $Statue;

        return $this;
    }

    public function getEmploye(): ?Employe
    {
        return $this->employe;
    }

    public function setEmploye(?Employe $employe): self
    {
        $this->employe = $employe;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
