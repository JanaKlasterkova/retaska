<?php

namespace App\Controller;

use App\Entity\Ordr;
use App\Form\OrdrType;
use App\Repository\OrdrRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/ordr")
 */
class OrdrController extends AbstractController
{

    /**
     * @Route("/", name="ordr_index", methods={"GET"})
     */
    public function index(OrdrRepository $ordrRepository): Response
    {
        return $this->render('ordr/index.html.twig', [
            'ordrs' => $ordrRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/", name="ordr_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ordr = new Ordr();
        $form = $this->createForm(OrdrType::class, $ordr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ordr);
            $entityManager->flush();

            return $this->redirectToRoute('ordr_index');
        }

        return $this->render('ordr/new.html.twig', [
            'ordr' => $ordr,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ordr_show", methods={"GET"})
     */
    public function show(Ordr $ordr): Response
    {
        return $this->render('ordr/show.html.twig', [
            'ordr' => $ordr,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ordr_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ordr $ordr): Response
    {
        $form = $this->createForm(OrdrType::class, $ordr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ordr_index');
        }

        return $this->render('ordr/edit.html.twig', [
            'ordr' => $ordr,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ordr_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ordr $ordr): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ordr->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ordr);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ordr_index');
    }
}
