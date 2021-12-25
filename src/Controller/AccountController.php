<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * Permet d'afficher et de gérer le formulaire de connexion
     * 
     * @Route("/login", name="account_login")
     * 
     * @return Response 
     */
    public function login(): Response
    {
        return $this->render('account/login.html.twig');
    }

    /**
     * Permet  de se déconnecter
     * 
     * @Route("/logout", name="account_logout")
     * 
     * @return void
     */

    public function logout(){
          //..rien !
    }
}
