<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Hydrator\CompanyHydrator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param CompanyHydrator $companyHydrator
     * @return Response
     */
    public function index(CompanyHydrator $companyHydrator)
    {
        $formationRepository = $this->getDoctrine()->getRepository(Formation::class);
        $latestFormations = $formationRepository->findLatestFormations(9);
        $companyHydrator->hydrateCollection($latestFormations);

        return $this->render('home/index.html.twig', [
            'formationList' => $latestFormations,
        ]);
    }
}
