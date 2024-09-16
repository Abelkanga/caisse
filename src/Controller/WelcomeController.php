<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\FdbRepository;
use App\Repository\BonapprovisionnementRepository;
use App\Repository\CaisseRepository;
use App\Utils\Status;
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

        // Récupérer le nombre d'utilisateurs par rôle
        $nbManagers = $userRepository->countByRole('ROLE_MANAGER');
        $nbManagers1 = $userRepository->countByRole('ROLE_MANAGER1');
        $nbResponsables = $userRepository->countByRole('ROLE_RESPONSABLE');
        $nbUsers = $userRepository->countByRole('ROLE_USER');
        $nbImpression = $userRepository->countByRole('ROLE_IMPRESSION');


        $nbFdb = $fdbRepository->count([]);
        // Nombre de fiches approuvées (en attente de conversion)
        $nbFdbApprouvees = $fdbRepository->count(['status' => Status::APPROUVED]);
        // Nombre de fiches converties
        $nbFdbConverties = $fdbRepository->count(['status' => Status::CONVERT]);

        $nbBonapprovisionnement = $bonapprovisionnementRepository->count([]);
        // Nombre de bons d'approvisionnement convertis
        $nbBonapprovisionnementConvertis = $bonapprovisionnementRepository->count(['status' => Status::CONVERT]);

        $nbCaisse = $caisseRepository->count([]);
        $user = $this->getUser(); // Obtenir l'utilisateur connecté
        $caisse = $user->getCaisse(); // Obtenir la caisse associée à l'utilisateur connecté

        // Calcul du solde de la caisse (s'il y a une caisse associée)
        $soldeCaisse = $caisse ? $caisse->getSoldedispo() : 0;

        return $this->render('welcome/index.html.twig', [
            'nbUser' => $nbUser,
            'nbFdb' => $nbFdb,
            'nbFdbApprouvees' => $nbFdbApprouvees,
            'nbFdbConverties' => $nbFdbConverties,
            'nbBonapprovisionnement' => $nbBonapprovisionnement,
            'nbBonapprovisionnementConvertis' => $nbBonapprovisionnementConvertis,
            'soldeCaisse' => $soldeCaisse,
            'nbCaisse' => $nbCaisse,
            'nbManagers' => $nbManagers,
            'nbManagers1' => $nbManagers1,
            'nbResponsables' => $nbResponsables,
            'nbUsers' => $nbUsers,
            'nbImpression' => $nbImpression,
        ]);
    }
}
