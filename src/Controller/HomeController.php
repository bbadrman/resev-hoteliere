<?php

namespace App\Controller;

use App\Repository\AdRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**     
     * @Route("/", name="homepage")
     * 
     */
    public function index(AdRepository $adsRespo, UserRepository $userRepo): Response
    {
        return $this->render('home.html.twig', [
            'ads' => $adsRespo->findBestAds(4),
            'users' => $userRepo->findBestUsers(2)
        ]);
    }
}
