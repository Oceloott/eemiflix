<?php
declare(strict_types=1);

namespace App\Controller;

use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route("/", name: 'homepage')]
    public function __invoke(MediaRepository $repository): Response
    {
        // $media = $repository->find(1);
        // $list = $repository->findAll();
        // $repository->findBy(['title' => 'The Godfather']);

        // dump($media,$list);

        // $categories = $repository->findAll();
        // dump($categories);

        return $this->render('index.html.twig', ['media'=> $repository->findAll() ]);
    }
}

?>