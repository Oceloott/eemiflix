<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Entity\Movie;


class MovieController extends AbstractController
{


    #[Route("/movie/{id}", name: 'detail_movie')]
    public function movie(Movie $movie): Response
    {
        return $this->render('movie/detail.html.twig',['movie'=> $movie
    ]);
    }
    
    // #[Route("/serie/{name}", name: 'detail_serie')]
    // public function serie(string $name): Response
    // {
    //     return $this->render('movie/detail_serie.html.twig',['film_name'=> $name
    // ]);
    // }

}

?>