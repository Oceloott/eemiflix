<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route("/admin", name: 'admin')]
    public function admin(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/admin.html.twig');
    }

    #[Route("/admin/add", name: 'admin_add')]
    public function adminAdd(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/admin_add_films.html.twig');
    }

    #[Route("/admin/movies", name: 'admin_movies')]
    public function adminMovies(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/admin_films.html.twig');
    }

    #[Route("/admin/users", name: 'admin_users')]
    public function adminUsers(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/admin_users.html.twig');
    }

}


?>