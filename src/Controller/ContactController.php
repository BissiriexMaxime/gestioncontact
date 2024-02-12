<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact", methods= ("GET"))
     */
    public function listeContacts(): Response
    {

        $manager= $this->getDoctrine()->getManager();
        $repo= $manager->getRepository(Contact::class);
        $listecontacts= $repo->findAll();
        

        return $this->render('contact/listeContacts.html.twig', [
            'controller_name' => 'ContactController',
            'contacts' => $listecontacts
        ]);
    }
}
