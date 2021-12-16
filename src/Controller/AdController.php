<?php

namespace App\Controller;

use App\Entity\Ad;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdController extends AbstractController
{
    /**
     * @Route("/ads", name="ads_index")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Ad::class);
        $ads = $repo->findAll();
        
        return $this->render('ad/index.html.twig', [
            'ads' => $ads,
        ]);
    }
}
