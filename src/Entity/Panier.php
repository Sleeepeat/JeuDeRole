<?php

namespace App\Entity;

use App\Entity\Produit;
use App\Repository\PanierRepository;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'panier', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    /**
     * @var Collection<int, Inserer>
     */
    #[ORM\OneToMany(targetEntity: Inserer::class, mappedBy: 'panier')]
    private Collection $inserer;

    public function __construct()
    {
        $this->inserer = new ArrayCollection();
    }


    
    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

   
    


    public function addProduit(Produit $produit)
    {
        //array_push($this->produitsId, $produit->getId());
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setPanier(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getPanier() !== $this) {
            $user->setPanier($this);
        }

        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Inserer>
     */
    public function getinserer(): Collection
    {
        return $this->inserer;
    }

    public function addInserer(Inserer $inserer): static
    {
        if (!$this->inserer->contains($inserer)) {
            $this->inserer->add($inserer);
            $inserer->setPanier($this);
        }

        return $this;
    }

    public function removeInserer(Inserer $inserer): static
    {
        if ($this->inserer->removeElement($inserer)) {
            // set the owning side to null (unless already changed)
            if ($inserer->getPanier() === $this) {
                $inserer->setPanier(null);
            }
        }

        return $this;
    }



   

    

  

    
   

}
