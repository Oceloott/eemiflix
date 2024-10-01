<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ListsController extends AbstractController
{
    #[Route("/lists", name: 'lists')]
    public function lists(): Response
    {
        return $this->render('lists.html.twig');
    }
}

?>