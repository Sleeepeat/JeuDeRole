<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ImageProduitType;
use App\Form\ProduitType;
use App\Entity\Produit;
use App\Entity\ImageProduit;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProduitRepository;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Entity\Panier;
use App\Entity\Inserer;


class CatalogueController extends AbstractController
{
    #[Route('/catalogue/{name}', name: 'app_catal_search')]
    public function catalogueSearch(): Response
    {
        return $this->render('catalogue/catalogue.html.twig', [
        ]);
    }
    #[Route('/catalogue/sessions', name: 'app_sessions')]
    public function sessions(): Response
    {
        return $this->render('catalogue/sessions.html.twig', [
        ]);
    }
    #[Route('/private-panier', name: 'app_panier')]
    public function panier(): Response
    {
        return $this->render('catalogue/panier.html.twig', [
        ]);
    }
    #[Route('/private-catalogue', name: 'app_catal')]
    public function Catalogue(
        Request $request,
        ProduitRepository $produitRepository,
        EntityManagerInterface $em): Response
    {
        $produits = $produitRepository->findAll();
        return $this->render('catalogue/articles.html.twig', ['produits' => $produits]);
    }
   
}
