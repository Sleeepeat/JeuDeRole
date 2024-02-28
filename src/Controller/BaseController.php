<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class BaseController extends AbstractController
{
 #[Route('/base', name: 'app_accueil')] // /base est l’URL de la page, name est le nom de la route
 public function index(): Response
 {
 return $this->render('base/index.html.twig', [ // render est la fonction qui va chercher le fichier TWIG pour l’afficher
 ]);
 }
}