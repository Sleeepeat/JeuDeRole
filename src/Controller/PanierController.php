<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProduitRepository;

class PanierController extends AbstractController
{
    #[Route('/panier/{id}', name: 'app_panier')]
    public function panier(ProduitRepository $produitRepository): Response
    {
        $produits = $produitRepository->findAll();
        $panier = $this->getUser()->getPanier()->getInserers();
        return $this->render('panier/panier.html.twig', [
            'produits'=> $produits,
            'panier'=> $panier
        ]);
    }
}
