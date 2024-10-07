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
        return $this->render('index.html.twig', ['medias'=> $repository->findAll() ]);
    }
}

?>