<?php

namespace App\Entity;

use App\Repository\CatalalogueRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatalalogueRepository::class)]
class Catalalogue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Prix = null;

    #[ORM\Column(type: Types::BLOB)]
    private $Image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): static
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getImage()
    {
        return $this->Image;
    }

    public function setImage($Image): static
    {
        $this->Image = $Image;

        return $this;
    }
}
