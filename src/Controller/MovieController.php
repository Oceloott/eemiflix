<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Entity\Media;


class MovieController extends AbstractController
{


    #[Route("/detail/{id}", name: 'detail_movie')]
    public function detail(Media $media): Response
    {
        return $this->render('movie/detail.html.twig',['media'=> $media]);
    }
    
}

?>