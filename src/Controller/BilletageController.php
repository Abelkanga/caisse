<?php

namespace App\Controller;

use App\Entity\Billetage;
use App\Entity\User;
use App\Entity\Bonapprovisionnement;
use App\Form\BilletageType;
use App\Repository\BilletageRepository;
use App\Repository\BonapprovisionnementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BilletageController extends AbstractController
{
    #[Route('/billetage', name: 'billetage_form')]
    public function index(
        Request                        $request,
        BonapprovisionnementRepository $bonapprovisionnementRepository,
        BilletageRepository            $billetageRepository,
        EntityManagerInterface         $entityManager
    ): Response
    {
        // Récupérer l'utilisateur connecté
        /** @var User $user */
        $user = $this->getUser();

        // Récupérer l'approvisionnement associé à l'utilisateur
        $bonapprovisionnement = $bonapprovisionnementRepository->findOneBy(['user' => $user]);
        if (!$bonapprovisionnement) {
            $this->addFlash('error', 'Aucun approvisionnement trouvé pour cet utilisateur.');
            return $this->redirectToRoute('app_welcome');
        }

        // Créer ou récupérer le billetage associé à l'approvisionnement
        $billetage = $billetageRepository->findOneBy(['bonapprovisionnement' => $bonapprovisionnement]);
        if (!$billetage) {
            $billetage = new Billetage();
            $billetage->setBonapprovisionnement($bonapprovisionnement);
        }

        // Calculer l'écart entre le montant total de l'approvisionnement et le montant total du billetage
        $balance = $billetage->getBalance();
        // Pour l'instant, nous supposons que $billetage->getMontantTotal() retourne 0 si non défini
        $billetage->setEcart($balance - $billetage->getBalance());

        // Créer et gérer le formulaire pour le billetage
        $form = $this->createForm(BilletageType::class, $billetage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($billetage);
            $entityManager->flush();
            $this->addFlash('success', 'Billetage enregistré avec succès.');
            return $this->redirectToRoute('app_welcome');
        }

        // Afficher le formulaire dans la vue
        return $this->render('billetage/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
