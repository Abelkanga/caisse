<?php
namespace App\Controller;

use App\Entity\BonCaisse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BonCaisseController extends AbstractController
{
    #[Route('/bon-caisse/{id}', name: 'bon_caisse_show')]
    public function show(BonCaisse $bonCaisse): Response
    {
        return $this->render('bon_caisse/index.html.twig', [
            'bonCaisse' => $bonCaisse,
        ]);
    }
}