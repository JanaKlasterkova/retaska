<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\OrdrRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjednavkaController extends AbstractController
{
    /**
     * @Route("/{id}", name="objednavka",methods={"GET"})
     */

    public function show($id, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($id);
        return $this->render('objednavka/index.html.twig', ['product' => $product]);
    }

    public function index(OrdrRepository $ordrRepository): Response
    {
        return $this->render('objednavka/index.html.twig', [
            'ordrs' => $ordrRepository->findAll(),
        ]);
    }
    public function new(Request $request): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('product_index');
        }

        return $this->render('objednavka/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }
}
