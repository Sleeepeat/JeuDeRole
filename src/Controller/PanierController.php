<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Panier;
use App\Entity\Produit;
use App\Entity\Inserer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class PanierController extends AbstractController
{
    #[Route('/private-panier', name: 'app_panier')]
    public function panier(): Response|null
    {   
        $panier = $this->getUser()->getPanier();
        return $this->render('catalogue/panier.html.twig', ['panier' => $panier]);
    }

    #[Route('/panier-ajouter', name: 'add_produit_to_panier')]
    public function addProduitToPanier(Request $request,ProduitRepository $produitRepository, EntityManagerInterface $em):Response
    {
        $produit = $produitRepository->findAll();
        return $this->render('catalogue/panier.html.twig', ['produit' => $produit]);
    }

    #[Route('/supprimer-panier/{id}', name: 'app_supprimer_produit_panier')]
    public function supprimerArticlePanier(Request $request,Inserer $inserer,EntityManagerInterface $em): Response
    {
        if($inserer!=null){
            $em->remove($inserer);
            $em->flush();
            $this->addFlash('notice','produit supprimé');
        }
        return $this->redirectToRoute('app_panier');
    }

    #[Route('/private-ajout-panier/{id}', name: 'app_ajout_panier')]
    public function ajoutPanier(Request $request,Produit $produit,EntityManagerInterface $em): Response
    {
        if($produit!=null){
            if ($this->getUser()->getPanier()==null){
                //le panier n'existe pas
                $panier = new Panier();
            }
            else {
                $panier = $this->getUser()->getPanier();
            }
            $inserer = new Inserer();
            $inserer->setPanier($panier);
            $inserer->setProduit($produit);
            $inserer->setQuantite(1);
            $panier->addInserer($inserer);
            $this->getUser()->setPanier($panier);
            $em->persist($inserer);
            $em->persist($panier);
            $em->persist($this->getUser());
            $em->flush();
            $this->addFlash('notice','produit ajouté au panier');
            
        }
        return $this->redirectToRoute('app_catal');
    }
}
