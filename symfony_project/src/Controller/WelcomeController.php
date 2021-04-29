<?php
// src/Controller/WelcomeController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function index(): Response
    {
        return $this->render('welcome/welcome.html.twig');

    }

      
}
