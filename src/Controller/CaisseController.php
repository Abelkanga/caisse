<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CaisseController extends AbstractController
{
    #[Route('/caisse', name: 'app_caisse')]
    public function index(): Response
    {
        return $this->render('caisse/index.html.twig', [
            'controller_name' => 'CaisseController',
        ]);
    }
}
