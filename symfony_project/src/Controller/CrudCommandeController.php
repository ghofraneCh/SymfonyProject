<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Form\CommandeType;
use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/crud/commande")
 */
class CrudCommandeController extends AbstractController
{
    /**
     * @Route("/", name="crud_commande_index", methods={"GET"})
     */
    public function index(CommandeRepository $commandeRepository): Response
    {
        return $this->render('crud_commande/index.html.twig', [
            'commandes' => $commandeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="crud_commande_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commande = new Commande();
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commande);
            $entityManager->flush();

            return $this->redirectToRoute('crud_commande_index');
        }

        return $this->render('crud_commande/new.html.twig', [
            'commande' => $commande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="crud_commande_show", methods={"GET"})
     */
    public function show(Commande $commande): Response
    {
        return $this->render('crud_commande/show.html.twig', [
            'commande' => $commande,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="crud_commande_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Commande $commande): Response
    {
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('crud_commande_index');
        }

        return $this->render('crud_commande/edit.html.twig', [
            'commande' => $commande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="crud_commande_delete", methods={"POST"})
     */
    public function delete(Request $request, Commande $commande): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commande->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('crud_commande_index');
    }
}
