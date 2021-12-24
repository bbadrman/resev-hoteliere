<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Image;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Console\CommandLoader\FactoryCommandLoader;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('FR-fr');

        //nous gérons les utilisateurs
        $users = [];

        for($i = 1; $i <= 10; $i++){
            $user = new User();
            $user->setFirstName($faker->firstname)
                ->setLastName($faker->lastname)
                ->setEmail($faker->email)
                ->setIntroduction($faker->sentence())
                ->setDescription('<p>' . join('</p><p>', $faker->paragraphs(3)) . '</p>')
                ->setHash('password');
                
            $manager->persist($user);
            $users[] = $user;
        }



//Nous gérons les annonces
        for ($i = 1; $i <= 30; $i++) {

            $ad = new Ad();

            $title = $faker->sentence();
            $coverImage = $faker->imageUrl(1000,350);
            $introduction = $faker->paragraph(2);
            $content = '<p>' . join('</p><p>', $faker->paragraphs(5)). '</p>';

            $user = $users[mt_rand(0, count($users) - 1)];


            $ad->setTitle($title)
        //    ->setSlug("titre-de-l-annonce-n-$i")
                ->setCoverImage($coverImage)
                ->setIntroduction($introduction)
                ->setContent($content)
                ->setPrice(mt_rand(40, 200))
                ->setRooms(mt_rand(1, 5))
                ->setAuthor($user);

            for ($j = 1; $j <= mt_rand(2, 5); $j++) {
            $image = new Image();
            $image->setUrl($faker->imageUrl())
                  ->setCaption($faker->sentence())
                  ->setAd($ad);
                $manager->persist($image);
            }
                $manager->persist($ad);
        }

        $manager->flush();
    }
}
