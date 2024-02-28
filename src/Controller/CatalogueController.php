<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatalogueController extends AbstractController
{
    #[Route('/catalogue/des', name: 'app_des')]
    public function des(): Response
    {
        return $this->render('catalogue/des.html.twig', [
        ]);
    }

        #[Route('/catalogue/minis', name: 'app_minis')]
    public function minis(): Response
    {
        return $this->render('catalogue/minis.html.twig', [
        ]);
    }
    #[Route('/catalogue/cartes', name: 'app_cartes')]
    public function cartes(): Response
    {
        return $this->render('catalogue/cartes.html.twig', [
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
