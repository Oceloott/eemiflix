<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MovieController extends AbstractController
{


    #[Route("/movie/{name}", name: 'detail_movie')]
    public function movie(string $name = ''): Response
    {
        return $this->render('movie/detail.html.twig',['film_name'=> $name
    ]);
    }
    
    #[Route("/serie/{name}", name: 'detail_serie')]
    public function serie(string $name): Response
    {
        return $this->render('movie/detail_serie.html.twig',['film_name'=> $name
    ]);
    }


    // #[Route("/movie/{category}/{name}/{number_page}", name:'movie_show')]
    // public function page2(string $name ='', string $category = 'action', int $number_page = 1 ): Response   
    // {
    //     return new Response('<html><body><h1 style="color:red">film : '. $name .' de la categorie '. $category .' a la page '. $number_page .'</></body></html>');
    // }
}


?>