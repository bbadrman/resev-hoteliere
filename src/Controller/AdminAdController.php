<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Form\AdType;
use App\Repository\AdRepository;
use App\Service\PaginationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminAdController extends AbstractController
{

    /**
     * Permet d'afficher les annonces en tableau 
     * @Route("/admin/ads/{page<\d+>?1}", name="admin_ads_index")
     * @return Response
     */
    public function index(AdRepository $repo, $page, PaginationService $pagination): Response
    {
        $pagination->setEntityClass(Ad::class)
                   ->setPage($page);
                   

        return $this->render('admin/ad/index.html.twig', [
            'pagination' => $pagination
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

    /**
     * @Route("/admin/ads/{id}/delete", name="admin_ads_delete")
     * @param Ad $ad
     * @param EntityManagerInterface $manager
     * @return Response 
     */

        public function delete(Ad $ad, EntityManagerInterface $manager){
            if (count($ad->getBookings()) > 0) {
                $this->addFlash(
                    'warning',
                    "Vous ne pouver pas supprimer l'annonce <strong>{$ad->getTitle()}</strong> Car elle posséde déja des réservation !"
                );
            } else {
                $manager->remove($ad);
                $manager->flush();

                $this->addFlash(
                    'success',
                    "L'annonce <strong>{$ad->getTitle()}</strong> a bien été supprimé !"
                );
            }
            return $this->redirectToRoute('admin_ads_index');
        }
}
