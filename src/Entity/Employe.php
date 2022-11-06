<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Cin = null;

    #[ORM\Column(length: 100)]
    private ?string $Nom = null;

    #[ORM\Column(length: 100)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 50)]
    private ?string $Cnss = null;

    #[ORM\Column(length: 100)]
    private ?string $SituationFam = null;

    #[ORM\Column(length: 4, nullable: true)]
    private ?string $NombreEnfant = null;

    #[ORM\Column(length: 100)]
    private ?string $Email = null;

    #[ORM\Column(length: 50)]
    private ?string $tele = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $Photos = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateNaiss = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateEntree = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateSortie = null;

    #[ORM\Column]
    private ?bool $StatueTravaille = null;

    #[ORM\Column(length: 255)]
    private ?string $Echelle = null;

    #[ORM\Column(length: 255)]
    private ?string $Echellon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?string
    {
        return $this->Cin;
    }

    public function setCin(string $Cin): self
    {
        $this->Cin = $Cin;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getCnss(): ?string
    {
        return $this->Cnss;
    }

    public function setCnss(string $Cnss): self
    {
        $this->Cnss = $Cnss;

        return $this;
    }

    public function getSituationFam(): ?string
    {
        return $this->SituationFam;
    }

    public function setSituationFam(string $SituationFam): self
    {
        $this->SituationFam = $SituationFam;

        return $this;
    }

    public function getNombreEnfant(): ?string
    {
        return $this->NombreEnfant;
    }

    public function setNombreEnfant(?string $NombreEnfant): self
    {
        $this->NombreEnfant = $NombreEnfant;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTele(): ?string
    {
        return $this->tele;
    }

    public function setTele(string $tele): self
    {
        $this->tele = $tele;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getPhotos(): ?string
    {
        return $this->Photos;
    }

    public function setPhotos(string $Photos): self
    {
        $this->Photos = $Photos;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->DateNaiss;
    }

    public function setDateNaiss(\DateTimeInterface $DateNaiss): self
    {
        $this->DateNaiss = $DateNaiss;

        return $this;
    }

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->DateEntree;
    }

    public function setDateEntree(\DateTimeInterface $DateEntree): self
    {
        $this->DateEntrée = $DateEntree;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(?\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function isStatueTravaille(): ?bool
    {
        return $this->StatueTravaille;
    }

    public function setStatueTravaille(bool $StatueTravaille): self
    {
        $this->StatueTravaille = $StatueTravaille;

        return $this;
    }

    public function getEchelle(): ?string
    {
        return $this->Echelle;
    }

    public function setEchelle(string $Echelle): self
    {
        $this->Echelle = $Echelle;

        return $this;
    }

    public function getEchellon(): ?string
    {
        return $this->Echellon;
    }

    public function setEchellon(string $Echellon): self
    {
        $this->Echellon = $Echellon;

        return $this;
    }
}
