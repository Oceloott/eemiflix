<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Subscription;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SubscriptionController extends AbstractController
{
    #[Route("/subscription", name: 'subscription')]
    public function subscription(Subscription $subscription): Response
    {
        return $this->render('subscription.html.twig', ['subscription' => $subscription]);
    }
}


?>