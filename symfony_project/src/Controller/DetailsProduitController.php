<?php
// src/Controller/WelcomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
use App\Entity\Commande;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

class DetailsProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index($id, Request $request)
    {
        $donnees = $this->getDoctrine()->getRepository(Produit::class)->find($id);

        return $this->render('welcome/product-details.html.twig', [
            'produit' => $donnees,
        ]);

    }


  /*  public function index(): Response
    {
        return $this->render('welcome/welcome.html.twig');

    }
    */
      
}
