<?php
// src/Controller/WelcomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {

        $donnees = $this->getDoctrine()->getRepository(Produit::class)->findBy([],['created_at' => 'desc']);

        $produit = $paginator->paginate(
            $donnees,
            $request->query->getInt('page', 1),6
        );

        return $this->render('welcome/welcome.html.twig', [
            'produit' => $produit,
        ]);

    }


  /*  public function index(): Response
    {
        return $this->render('welcome/welcome.html.twig');

    }
    */
      
}
