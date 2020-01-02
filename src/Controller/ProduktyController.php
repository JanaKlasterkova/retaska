<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class ProduktyController extends AbstractController
{
    /**
     * @Route("/produkty", name="produkty", methods={"GET"})
     */
    public function show(ProductRepository $productRepository,CategoryRepository $categoryRepository): Response

    {
        return $this->render('produkty/index.html.twig', [
            'products' => $productRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
        ]);
    }



}

