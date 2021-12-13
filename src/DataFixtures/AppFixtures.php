<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 30; $i++) {

            $ad = new Ad();
            $ad->setTitle("Titre de l'annonce n°$i")
           ->setSlug("titre-de-l-annonce-n-$i")
           ->setCoverImage("http://placeholder.com")
           ->setIntroduction("Bonjour à tout")
           ->setContent("<p> Je suis un conent riche !</p>")
           ->setPrice(mt_rand(40, 200))
           ->setRooms(mt_rand(1, 5));
            $manager->persist($ad);
        }

        $manager->flush();
    }
}
