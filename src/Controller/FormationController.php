<?php

namespace App\Controller;

use App\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{
    /**
     * @Route("/formation/{id}", name="formation")
     * @param Formation $formation
     * @return Response
     */
    public function index(Formation $formation)
    {
        return $this->render('formation/index.html.twig', [
            'formation' => $formation
        ]);
    }
}
