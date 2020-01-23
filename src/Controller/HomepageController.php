<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function show(ProductRepository $productRepository): Response
    {
        return $this->render('homepage/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

/**
 * @Route("/thx", name="thx")
 */
public function thx()
{
    return $this->render('homepage/thx.html.twig', [
        'controller_name' => 'HomepageController',
    ]);
}
    /**
     * @Route("/false", name="false")
     */
    public function info()
    {
        return $this->render('homepage/false.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }
}
