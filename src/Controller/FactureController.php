<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Form\FactureType;
use App\Repository\FactureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/facture")
 */
class FactureController extends AbstractController
{
    /**
     * @Route("/", name="app_facture_index", methods={"GET"})
     */
    public function index(FactureRepository $factureRepository,PaginatorInterface $paginator,Request $request): Response
    {
        $pagination = $paginator->paginate(
            $factureRepository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );
        return $this->render('facture/index.html.twig', [
            'factures' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="app_facture_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FactureRepository $factureRepository): Response
    {
        $facture = new Facture();
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facture->setPrixTtc($facture->getPrixHt()+$facture->getPrixHt()*20/100);

            $factureRepository->add($facture, true);

            return $this->redirectToRoute('app_facture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('facture/new.html.twig', [
            'facture' => $facture,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_facture_show", methods={"GET"})
     */
    public function show(Facture $facture): Response
    {
        return $this->render('facture/show.html.twig', [
            'facture' => $facture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_facture_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Facture $facture, FactureRepository $factureRepository): Response
    {
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $factureRepository->add($facture, true);

            return $this->redirectToRoute('app_facture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('facture/edit.html.twig', [
            'facture' => $facture,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_facture_delete", methods={"POST"})
     */
    public function delete(Request $request, Facture $facture, FactureRepository $factureRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facture->getId(), $request->request->get('_token'))) {
            $factureRepository->remove($facture, true);
        }

        return $this->redirectToRoute('app_facture_index', [], Response::HTTP_SEE_OTHER);
    }
}
