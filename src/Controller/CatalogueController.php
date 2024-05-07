<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Categorie;
use App\Entity\Produit;

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
    #[Route('/private-catalogue/panier', name: 'app_panier')]
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
