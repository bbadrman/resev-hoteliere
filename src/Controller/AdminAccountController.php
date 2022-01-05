<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAccountController extends AbstractController
{
    /**
     * Permet d'afficher login d'administration 
     * 
     * @Route("/admin/login", name="admin_account_login")
     * 
     * @return Response
     */
    
    public function login(): Response
    {
        return $this->render('admin/account/login.html.twig', [
            'controller_name' => 'AdminAccountController',
        ]);
    }
}
