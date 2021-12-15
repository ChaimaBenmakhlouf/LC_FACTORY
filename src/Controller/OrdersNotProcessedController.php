<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Order;
use Doctrine\Persistence\ManagerRegistry;

class OrdersNotProcessedController extends AbstractController
{
    #[Route('/orders/not/processed', name: 'orders_not_processed')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $em = $doctrine->getManager();

        $orders = $em->getRepository(Order::class)->findAll();


        return $this->render('orders_not_processed/index.html.twig', [
            'orders' => $orders,
        ]);
    }
}
