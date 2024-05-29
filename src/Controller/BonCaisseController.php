<?php

namespace App\Controller;

use App\Entity\BonCaisse;
use App\Repository\BonCaisseRepository;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BonCaisseController extends AbstractController
{
    #[Route('/bon/encaisse', name: 'app_bon_encaisse')]
    public function index_encaissement(BonCaisseRepository $bonCaisseRepository): Response
    {


        return $this->render('bon_caisse/index_encaissement.html.twig');
    }

    #[Route('/bon/decaisse', name: 'app_bon_decaisse')]
    public function index_decaissement(BonCaisseRepository $bonCaisseRepository): Response
    {


        return $this->render('bon_caisse/index_decaissement.html.twig');

    }
}
