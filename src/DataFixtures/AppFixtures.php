<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Comment;
use App\Entity\Episode;
use App\Entity\Language;
use App\Entity\Media;
use App\Entity\Movie;
use App\Entity\Playlist;
use App\Entity\PlaylistMedia;
use App\Entity\PlaylistSubscription;
use App\Entity\Season;
use App\Entity\Serie;
use App\Entity\Subscription;
use App\Entity\SubscriptionHistory;
use App\Entity\User;
use App\Entity\WatchHistory;
use App\Enum\MediaMediaTypeEnum;
use App\Enum\CommentStatusEnum;

use App\Enum\UserAccountStatusEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        

        for($i = 0; $i < 10; $i++) {
            $film1 = new Movie();
            $film1->setTitle('The Godfather');
            $film1->setCoverImage('godfather.jpg');
            $film1->setShortDescription('The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.');
            $film1->setLongDescription('The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.');
            $film1->setReleaseAt(new \DateTime());
            $film1->setMediaType(MediaMediaTypeEnum::MOVIE);
            $manager->persist($film1);
        }
        $film2 = new Movie();
        $film2->setTitle('The Godfather');
        $film2->setCoverImage('godfather.jpg');
        $film2->setShortDescription('The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.');
        $film2->setLongDescription('The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.');
        $film2->setReleaseAt(new \DateTime());
        $film2->setMediaType(MediaMediaTypeEnum::MOVIE);
        $manager->persist($film2);

        for($i = 0; $i < 10; $i++) {
            $serie1 = new Serie();
            $serie1->setTitle('Breaking Bad');
            $serie1->setCoverImage('breakingbad.jpg');
            $serie1->setShortDescription('A high school chemistry teacher turned methamphetamine producer partners with a former student to secure his family\'s future.');
            $serie1->setLongDescription('A high school chemistry teacher turned methamphetamine producer partners with a former student to secure his family\'s future.');
            $serie1->setMediaType(MediaMediaTypeEnum::SERIE);
            $serie1->setReleaseAt(new \DateTime());
            $manager->persist($serie1);
        }
        
        $serie2 = new Serie();
        $serie2->setTitle('Breaking Bad');
        $serie2->setCoverImage('breakingbad.jpg');
        $serie2->setShortDescription('A high school chemistry teacher turned methamphetamine producer partners with a former student to secure his family\'s future.');
        $serie2->setLongDescription('A high school chemistry teacher turned methamphetamine producer partners with a former student to secure his family\'s future.');
        $serie2->setMediaType(MediaMediaTypeEnum::SERIE);
        $serie2->setReleaseAt(new \DateTime());
        $manager->persist($serie2);

        
        $saison = new Season();
        $saison->setSerie($serie2);
        $saison->setSeasonNumber(1);
        $manager->persist($saison);

        $episode = new Episode();
        $episode->setSeason($saison);
        $episode->setTitle('Pilot');
        $episode->setDuration(\DateTime::createFromFormat('H:i:s', '01:30:00'));
        $episode->setReleaseAt(new \DateTime());
        $manager->persist($episode);

        $subscription = new Subscription();
        $subscription->setName('Premium');
        $subscription->setPrice(9.99);
        $subscription->setDurationInMonths(1);
        $manager->persist($subscription);

        $user = new User();
        $user->setUsername('baptiste');
        $user->setEmail('fdsfdsdfs@exemple.fr');
        $user->setPassword('password');
        $user->setCurrentSubscription($subscription);
        $user->setAccountStatus(UserAccountStatusEnum::ACTIVE);
        $manager->persist($user);





        $playlist = new Playlist();
        $playlist->setName('My playlist');
        $playlist->setUsername($user);
        $playlist->setCreateAt(new \DateTimeImmutable());
        $playlist->setUpdateAt(new \DateTimeImmutable());
        $manager->persist($playlist);

        $playlistMedia = new PlaylistMedia();
        $playlistMedia->setPlaylist($playlist);
        $playlistMedia->setMedia($film2);
        $playlistMedia->setAddedAt(new \DateTimeImmutable());
        $manager->persist($playlistMedia);



        $watchhistory = new WatchHistory();
        $watchhistory->setUsername($user);
        $watchhistory->setMedia($film2);
        $watchhistory->setLastWatchedAt(new \DateTimeImmutable());
        $watchhistory->setNumberOfViews(5);
        $manager->persist($watchhistory);
        

        $subscriptionHistory = new SubscriptionHistory();
        $subscriptionHistory->setSubscription($subscription);
        $subscriptionHistory->setUsername($user);
        $subscriptionHistory->setStartAt(new \DateTimeImmutable());
        $subscriptionHistory->setEndAt(new \DateTimeImmutable());
        $manager->persist($subscriptionHistory);


        $playlistSubscription = new PlaylistSubscription();
        $playlistSubscription->setPlaylist($playlist);
        $playlistSubscription->setUsername($user);
        $playlistSubscription->setSubscribedAt(new \DateTimeImmutable());
        $manager->persist($playlistSubscription);



        $comment = new Comment();
        $comment->setUsername($user);
        $comment->setMedia($film2);
        $comment->setContent('This is a comment');
        $comment->setStatus(CommentStatusEnum::VALIDATED);
        $manager->persist($comment);

        $history = new WatchHistory();
        $history-> setMedia($film2);
        $history->setUsername($user);
        $history->setLastWatchedAt(new \DateTimeImmutable());
        $history->setNumberOfViews(5);
        $manager->persist($history);

        $language = new Language();
        $language->setName('English');
        $language->setCode('en');
        $manager->persist($language);



        $tableau = [
            ['Action', 'action'],
            ['Comedy', 'comedy'],
        ];

        foreach($tableau as $element) {
            $categorie = new Categorie();
            $categorie->setName($element[0]);
            $categorie->setLabel($element[1]);
            $manager->persist($categorie);
        }

        $manager->flush();
    }
}
