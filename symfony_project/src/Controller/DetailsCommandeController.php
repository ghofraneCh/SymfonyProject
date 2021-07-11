<?php
// src/Controller/DetailsProduitController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
use App\Entity\Commande;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

class DetailsCommandeController extends AbstractController
{
    /**
     * @Route("/commander/{id}", name="commander")
     */
    public function index($id, Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $commande = new Commande();
        $commande->setIdProduit($id);     
        $commande->setIdUser($user->getId());      
        $commande->setDateCommande(new \DateTime());
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($commande);
        $entityManager->flush();

        return $this->render('welcome/commande-details.html.twig', [
            'commande' => $commande,
        ]);
        
    }

    
      
}
