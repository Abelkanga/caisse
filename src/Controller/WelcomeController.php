<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\FdbRepository;
use App\Repository\BonapprovisionnementRepository;
use App\Repository\CaisseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    #[Route('/', name: 'app_welcome')]
    public function index(
        UserRepository $userRepository,
        FdbRepository $fdbRepository,
        BonapprovisionnementRepository $bonapprovisionnementRepository,
        CaisseRepository $caisseRepository
    ): Response {
        $nbUser = $userRepository->count([]);

        $nbFdb = $fdbRepository->count([]);
        $nbBonapprovisionnement = $bonapprovisionnementRepository->count([]);

        $nbCaisse = $caisseRepository->count([]);
        $caisse = $caisseRepository->findOneBy([]);

        // Calcul du solde de la caisse (s'il y a une caisse associée)
        $soldeCaisse = $caisse ? $caisse->getSoldedispo() : 0;

        return $this->render('welcome/index.html.twig', [
            'nbUser' => $nbUser,
            'nbFdb' => $nbFdb,
            'nbBonapprovisionnement' => $nbBonapprovisionnement,
            'soldeCaisse' => $soldeCaisse,
            'nbCaisse' => $nbCaisse,
        ]);
    }
}
