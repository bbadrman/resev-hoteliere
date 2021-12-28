<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Entity\Booking;
use App\Form\BookingType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookingController extends AbstractController
{
    /**
     * @Route("/ads/{slug}/book", name="booking_create")
     */
    public function  book(Ad $ad): Response

    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        
        return $this->render('booking/book.html.twig', [
            'ad' => $ad,
            'form' => $form->createView()
        ]);
    }
}
