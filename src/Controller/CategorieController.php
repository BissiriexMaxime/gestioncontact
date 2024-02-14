<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie")
     */
    public function index(CategorieRepository $repo): Response
    {

        $categorie= $repo->findAll();

        return $this->render('categorie/categorie.html.twig', [
                'categorie' => $categorie,
        ]);
    }

/** 
      * @Route("/categorie/{id}", name="lacategorie", methods={"GET"})
      */ 
    public function lacategorie($id, CategorieRepository $repo): Response
      {
          $categorie = $repo->find($id);
          return $this->render('categorie/ficheCategorie.html.twig',[
              "lacategorie"=> $categorie,
            ]);  
      }
}



    
