<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'app_catal')]
    public function catalogue(): Response
    {
        return $this->render('catalogue/catalogue.html.twig', [
        ]);
    }
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
    #[Route('/catalogue/panier', name: 'app_panier')]
    public function panier(): Response
    {
        return $this->render('catalogue/panier.html.twig', [
        ]);
    }
}
