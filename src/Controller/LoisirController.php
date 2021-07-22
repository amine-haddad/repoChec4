<?php

namespace App\Controller;

use app\Entity\Category;
use App\Entity\Loisir;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/loisirs",name="loisir_")
 */
class LoisirController extends AbstractController

{
    /**
     * @Route("/",name="index")
     * @return Response
     */
    public function index(): Response

    {

        $loisirs = $this->getDoctrine()

            ->getRepository(Loisir::class)
            ->findAll();
        return $this->render(
            'loisir/index.html.twig',
            [

                'numberPrograms'=>count($loisirs)." programs dans le catalogue",
                'website' => 'Loisirs',
                
                'loisirs' => $loisirs
            ]
        );
        
    }

    /**
     * @Route("/new", name="new")
     */
    public function new(): Response
    {
        // traitement d'un formulaire par exemple
        // redirection vers la page 'program_show',
        // correspondant à l'url /loisirs/4
        return $this->redirectToRoute('loisir_show', ['id' => 4]);
    }

    /**
     * 
     */
    

    /**
     * @Route("/{id}", name="show", methods={"GET"},requirements={"id"="\d+"})
     * 
     * 
     * 
     * @return Response
     */
    public function show(Loisir $loisirId): Response
    {;
        if (!$loisirId) {
            throw $this->createNotFoundException(
                'No loisir with id : ' . $loisirId . ' found in program\'s table.'
            );
        }
        $category = $loisirId->getCategory();
        if (!$category) {
            throw $this->createNotFoundException(
                'No category with id : ' . $category . ' found in program\'s table.'
            );
        }
        return $this->render('loisir/show.html.twig', [

            'categories' => $category,
           
            
            
        ]);
    }
}
