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
    #[Route('/bon/caisse', name: 'app_bon_caisse')]
    public function index(BonCaisseRepository $bonCaisseRepository): Response
    {
        $boncaisse = $bonCaisseRepository->findAll();

        return $this->render('bon_caisse/index.html.twig', [
            'boncaisse' => $boncaisse
        ]);
    }

}
