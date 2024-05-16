<?php

namespace App\Entity;

use App\Entity\Produit;
use App\Entity\Panier;
use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'id')]
    private ?int $idProduit = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Panier::class, inversedBy: 'id')]
    private ?int $idPanier = null;

    #[ORM\Column]
    private ?int $quantity = null;

    public function getIdProduit(): ?int
    {
        return $this->idProduit;
    }

    public function setIdProduit(int $idProduit): static
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getIdPanier(): ?int
    {
        return $this->idPanier;
    }

    public function setIdPanier(int $idPanier): static
    {
        $this->idPanier = $idPanier;

        return $this;
    }
}
