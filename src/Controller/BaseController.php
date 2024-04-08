<?php
namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Repository\ProduitRepository;
use App\Form\AjoutProduitType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends AbstractController
{
 #[Route('/', name: 'app_accueil')] // /base est l’URL de la page, name est le nom de la route
 public function index(): Response
 {
 return $this->render('base/index.html.twig', [ // render est la fonction qui va chercher le fichier TWIG pour l’afficher
 ]);
 }
 #[Route('/mod-liste-utilisateur', name: 'app_list_user')]
    public function listeUser(UserRepository $userRepository): Response
    {
        $user = $userRepository->findAll();
        return $this->render('base/liste-users.html.twig', ['user' => $user]);
    }
    #[Route('/private-profil', name: 'app_Profil')]
    public function Profil(UserRepository $userRepository): Response
    {
        $user = $userRepository->findAll();
        return $this->render('base/profil.html.twig', ['user' => $user]);
    }
    #[Route('/mod-liste-produit', name: 'app_list_produit')]
    public function listeProduit(ProduitRepository $produitRepository): Response
    {
        $produit = $produitRepository->findAll();
        return $this->render('base/liste-produit.html.twig', ['produit' => $produit]);
    }

    #[Route('/mod-ajout-produit', name: 'app_ajout_produit')]
    public function ajoutProduit(Request $request, EntityManagerInterface $em): Response
    {   
        $produit = new Produit();
        $form = $this->createForm(AjoutProduitType::class, $produit);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($produit);
                $em->flush();
                $this->addFlash('notice', 'Produit Ajouté');
                return $this->redirectToRoute('app_ajout_produit');
            }
        }
        return $this->render('base/ajout-produit.html.twig', ['form' => $form->createView()]);
    }
}