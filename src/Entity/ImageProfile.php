<?php

namespace App\Entity;

use App\Repository\ImageProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageProfileRepository::class)]
class ImageProfile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomImage = null;

    #[ORM\OneToMany(mappedBy: 'ImageProfile', targetEntity: Employe::class)]
    private Collection $employes;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomImage(): ?string
    {
        return $this->NomImage;
    }

    public function setNomImage(string $NomImage): self
    {
        $this->NomImage = $NomImage;

        return $this;
    }

  
  

}
