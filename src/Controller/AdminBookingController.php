<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\AdminBookingType;
use App\Service\PaginationService;
use App\Repository\BookingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminBookingController extends AbstractController
{
    /**
     * Permet d'afficher les annonces en tableau 
     * @Route("/admin/bookings/{page<\d+>?1}", name="admin_bookings_index")
     * @return Response
     */

    public function index( $page, PaginationService $pagination): Response
    {
        $pagination->setEntityClass(Booking::class)
                   ->setPage($page);

        return $this->render('admin/booking/index.html.twig', [
            'pagination' => $pagination
        ]);
    }

    /**
     * Permet d'éditer une réservation 
     * 
     * @Route("/admin/bookings/{id}/edit", name="admin_bookings_edit")
     */

    public function edit(Booking $booking, Request $request, EntityManagerInterface $manager)
    {

        $form = $this->createForm(AdminBookingType::class, $booking);

        
         $form->handleRequest($request);

       
         if ($form->isSubmitted() && $form->isValid()) {

            //pour recalculer ammount  en modification du reservation
            $booking->setAmount(0);

            $manager->persist($booking);
            $manager->flush();

            $this->addFlash(
                'success',
                "La réservation n° <strong>{$booking->getId()}</strong> a bien été modifiée !"
            );
            return $this->redirectToRoute("admin_bookings_index");
        }

        return $this->render('admin/booking/edit.html.twig', [
            'form' => $form->createView(),
            'booking' => $booking
        ]);
    }

    /**
     * Permet au admin de supprimer
     *
     * @Route("/admin/bookings/{id}/delete", name="admin_bookings_delete")
     * @param Booking $booking
     * @return Response
     */

    public function delete(Booking $booking, EntityManagerInterface $manager)
    {
        $manager->remove($booking);
        $manager->flush();

        $this->addFlash(
            'success',
            "La réservation n° <strong>{$booking->getId()}</strong> a été bien supprimée !"
        );
        return $this->redirectToRoute("admin_bookings_index");
    }
    
}
