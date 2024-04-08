<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use app\Form\CatalogueAjoutType;

class CatalogueAjoutController extends AbstractController
{
    #[Route('/catalogue/ajout', name: 'app_catalogue_ajout')]
    public function index(): Response
    {   
        $form = $this->createForm(CatalogueAjoutType::class);
        return $this->render('catalogue_ajout/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
