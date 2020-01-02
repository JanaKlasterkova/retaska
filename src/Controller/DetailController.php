<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    /**
     * @Route("/detail/{id}", name="detail",methods={"GET"})
     */

    public function show($id, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($id);
        return $this->render('detail/index.html.twig', ['product' => $product]);
    }
}
