<?php

namespace App\Controller;

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

        return $this->render('loisir/index.html.twig', [

            'website' => 'Loisirs',

        ]);
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
     * @Route("/{id}", name="show", methods={"GET"},requirements={"id"="\d+"})
     */
    public function show()
    {
        return $this->render('loisir/show.html.twig', [
            'website' => 'Loisirs',
        ]);
    }
}
