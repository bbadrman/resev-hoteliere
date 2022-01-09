<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Form\AdType;
use App\Repository\AdRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminAdController extends AbstractController
{

    /**
     * Permet d'afficher les annonces en tableau 
     * @Route("/admin/ads", name="admin_ads_index")
     * @return Response
     */
    public function index(AdRepository $repo): Response
    {
        return $this->render('admin/ad/index.html.twig', [
            'ads' => $repo->findAll()
        ]);
    }

    /**
     * Permet d'afficher la formulaire d'edition
     * 
     * @Route("/admin/ads/{id}/edit", name="admin_ads_edit")
     * 
     * @param Ad $ad
     * @return Response 
     */

    public function edit(Ad $ad, Request $request, EntityManagerInterface $manager){
        $form =  $this->createForm(AdType::class, $ad);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($ad);
            $manager->flush();

            $this->addFlash(
                'success',
                "L'annonce <strong>{$ad->getTitle()}</strong> a bien été enregistrée !"
            );
        }
        return $this->render('admin/ad/edit.html.twig', [
           'ad'   => $ad,
           'form' => $form->createView()
        ]);
        }
}
