<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Enum\UserAccountStatusEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 10; $i++) {
            $film = new Movie();
            $film->setTitle('The Godfather');
            $film->setCoverImage('godfather.jpg');
            $film->setShortDescription('The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.');
            $film->setLongDescription('The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.');
            $film->setReleaseDate(new \DateTime());
            $manager->persist($film);
        }


        $user = new User();
        $user->setUsername('baptiste');
        $user->setEmail('fdsfdsdfs@exemple.fr');
        $user->setPassword('password');
        $user->setAccountStatus(UserAccountStatusEnum::ACTIVE);
        $manager->persist($user);

        $history = new WatchHistory();
        $history-> setMedia($film);
        $history->setUsername($user);
        $history->setLastWatchedAt(new \DateTimeImmutable());
        $history->setNumberOfViews(5);
        $manager->persist($history);

        $tableau = [
            ['Action', 'action'],
            ['Comedy', 'comedy'],
        ];

        foreach($tableau as $element) {
            $element = new Categorie();
            $element->setName($element[0]);
            $element->setLabel($element[1]);
            $manager->persist($element);
        }

        $manager->flush();
    }
}
