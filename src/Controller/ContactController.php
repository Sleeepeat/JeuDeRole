<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Contact;
use App\Entity\Categorie;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends AbstractController
{
    #[Route('/liste-contacts', name: 'app_liste_contacts')]
    public function listeContact(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAll();
        return $this->render('contact/liste-contacts.html.twig', ['contacts' => $contacts]);
    }
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, EntityManagerInterface $em): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $contact->setDateEnvoi(new \Datetime());
                $em->persist($contact);
                $em->flush();
                $this->addFlash('notice', 'Message envoyé');
                return $this->redirectToRoute('contact');
            }
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/mod-supprimer-contact/{id}', name: 'app_supprimer_contact')]
public function supprimercontact(Request $request,contact $contact,EntityManagerInterface $em): Response
{
if($contact!=null){
$em->remove($contact);
$em->flush();
$this->addFlash('notice','contact supprimé');
}
return $this->redirectToRoute('app_liste_contact');
}
}
