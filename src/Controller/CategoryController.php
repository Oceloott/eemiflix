<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;



class CategoryController extends AbstractController
{
    #[Route('/category/{id}', name: 'show_category')]
    public function show_category(Categorie $category): Response
    {
        return $this->render('category.html.twig', ['category' => $category]);
    }

    #[Route('/discover', name: 'discover')]
    public function discover(CategorieRepository $repository): Response
    {
        return $this->render('discover.html.twig', [
            'categories' => $repository->findAll()
        ]);
    }
}


?>