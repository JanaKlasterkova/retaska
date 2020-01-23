<?php

namespace App\Controller;

use App\Entity\Ordr;
use App\Entity\Product;
use App\Form\OrdrType;
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
     * @Route("/objednavka/{id}", name="objednavka",methods={"GET","POST"})
     */
    public function new(Request $request,Product $product): Response
    {
        $ordr = new Ordr();
        $form = $this->createForm(OrdrType::class, $ordr);
        $form->handleRequest($request);

        $ProductOnStock = true;

        if ($product->getSklad() <= 0){
            $ProductOnStock = false;
        }
        if ($form->isSubmitted() && $form->isValid() && $ProductOnStock)  {

            $ordr->setProduct($product);

            $aktualneNaSklade=$product->getSklad();
            $pocetNaSkladePoObjednani=$aktualneNaSklade - 1;
            $product->setSklad($pocetNaSkladePoObjednani);

            $cenaDopravy=$ordr->getDoprava()->getPrice();
            $cenaPlatby=$ordr->getPlatba()->getPrice();
            $cenaProduktu=$product->getPrice();
            $ordr->setTotalPrice($cenaDopravy+$cenaPlatby+$cenaProduktu);


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ordr);
            $entityManager->flush();


            return $this->redirectToRoute('thx');//děkovná stránka
        }


        return $this->render('objednavka/index.html.twig', [
            'objednavka'=>$ordr,
            'product' => $product,
            'form' => $form->createView(),
            'ProductOnStock'=>$ProductOnStock,
            'remainingOnStock'=>$product->getSklad(),
            'productsPrice'=>$product->getPrice()
        ]);
    }
}
