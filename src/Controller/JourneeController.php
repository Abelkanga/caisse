<?php

namespace App\Controller;

use App\Entity\Billetage;
use App\Entity\Bonapprovisionnement;
use App\Entity\Fdb;
use App\Entity\JournalCaisse;
use App\Entity\Journee;
use App\Entity\User;
use App\Form\JourneeCloseType;
use App\Form\OpenType;
use App\Repository\FdbRepository;
use App\Repository\BonapprovisionnementRepository;
use App\Repository\JourneeRepository;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

// src/Controller/JourneeController.php

#[Route('/comptability/caisse', name: 'app_comptability_caisse_')]
class JourneeController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(JourneeRepository $journeeRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $caisse = $user->getCaisse();

        if (!$caisse) {
            // Redirige ou affiche un message si aucune caisse n'est trouvée
            $this->addFlash('error', 'Aucune caisse n\'est associée à votre compte.');
            return $this->redirectToRoute('app_comptability_caisse_journee_open');
        }

        // Récupération de la journée active
        $activeJournee = $journeeRepository->activeJournee();
        if (!$activeJournee) {
            return $this->redirectToRoute('app_comptability_caisse_journee_open');
        }

        // Récupération du jour précédent (dernière journée fermée)
        $lastday = $journeeRepository->lastJournee($caisse);

        // Récupération du solde actif du jour
        $today = $journeeRepository->activeSolde($caisse);

        // Récupération des approvisionnements du jour
        $bonapprovisionnements = $journeeRepository->getBonApprovisionnementsForJournee($activeJournee);

        // Récupération des dépenses du jour
        $fdb = $journeeRepository->getFdbForJournee($activeJournee);

        // Récupération des approvisionnements caisse à caisse du jour
        $approCaisse = $journeeRepository->getApproCaisseForJournee($activeJournee);


        return $this->render('welcome/index.html.twig', [
            'last_journee' => $lastday,
            'today' => $today,
            'activeJournee' => $activeJournee,
            'bonapprovisionnements' => $bonapprovisionnements,
            'bonapprovisionnement' => $bonapprovisionnements,
            'fdb' => $fdb,
            'approCaisse' => $approCaisse,
        ]);
    }

    #[Route('/journee/open', name: 'journee_open', methods: ['GET', 'POST'])]
    public function open(
        Request $request,
        JourneeRepository $journeeRepository,
        EntityManagerInterface $manager
    ): Response
    {
        $activeJournee = $journeeRepository->activeJournee();
        if ($activeJournee) {
            $this->addFlash('error', 'La caisse est déjà ouverte');
            return $this->redirectToRoute('app_comptability_caisse_index');
        }

        /** @var User $user */
        $user = $this->getUser();
        $caisse = $user->getCaisse();

        if (!$caisse) {
            // Redirige ou affiche un message si aucune caisse n'est trouvée
            $this->addFlash('error', 'Aucune caisse n\'est associée à votre compte.');
            return $this->redirectToRoute('app_comptability_caisse_journee_open');
        }

        $journee = (new Journee())
            ->setCaisse($caisse)
            ->setDebit(0)
            ->setCredit(0)
            ->setLastSolde($caisse->getSoldedispo())
            ->setSolde($caisse->getSoldedispo())
            ->setStartedAt(new \DateTimeImmutable())
            ->setActive(true)
            ->setUuid(uniqid());


        // Vérification du code de la caisse
//        $caisseCode = $caisse->getCode();
//        $intitule = 'Solde de la caisse au ' . $journee->getStartedAt()->format('d/m/Y'); // Intitulé par défaut
//
//        if ($caisseCode === 'C001') {
//            $intitule = 'Solde de la caisse principale au ' . $journee->getStartedAt()->format('d/m/Y');
//        } elseif ($caisseCode === 'C002') {
//            $intitule = 'Solde de la caisse secondaire au ' . $journee->getStartedAt()->format('d/m/Y');
//        } elseif ($caisseCode === 'C003') {
//            $intitule = 'Solde de la caisse spéciale au ' . $journee->getStartedAt()->format('d/m/Y');
//        }

// Vérification du code de la caisse et attribution de l'intitulé
        $caisseCode = $caisse->getCode();
        $dateFormatted = $journee->getStartedAt()->format('d/m/Y');

// Définition des intitulés par code de caisse
        $libelles = [
            'C001' => 'Solde de la caisse principale au ' . $dateFormatted,
            'C002' => 'Solde de la caisse secondaire au ' . $dateFormatted,
            'C003' => 'Solde de la caisse spéciale au ' . $dateFormatted,
        ];

// Attribution de l'intitulé selon le code de caisse, ou valeur par défaut
        $intitule = $libelles[$caisseCode] ?? 'Solde de la caisse au ' . $dateFormatted;


        $journalCaisse = (new JournalCaisse())
            ->setCaisse($caisse)
            ->setIntitule($intitule)
            ->setEntree($caisse->getSoldedispo() ?? 0)
            ->setSolde($caisse->getSoldedispo() ?? 0)
            ->setCreatedAt(new \DateTimeImmutable())
            ->setDate(new \DateTime());

        $form = $this->createForm(OpenType::class, $journee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($journee);
            $manager->persist($journalCaisse);
            $manager->flush();


            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Caisse ouverte avec succès');

            return $this->redirectToRoute('app_comptability_caisse_index');
        }

        return $this->render('journee/open.html.twig', [
            'form' => $form->createView(),
            'day' => $journee,
        ]);
    }

    #[Route('/journee/close', name: 'journee_close', methods: ['GET', 'POST'])]
    public function close(
        Request $request,
        JourneeRepository $journeeRepository,
        EntityManagerInterface $manager
    ): Response
    {
        /** @var Journee $active */
        $active = $journeeRepository->activeJournee();
        if (!$active) {
            flash()
                ->options([
                    'timeout' => 5000, // 5 seconds
                    'position' => 'bottom-right',
                ])
                ->error('La caisse est déjà fermée');

            return $this->redirectToRoute('app_comptability_caisse_index');
        }

        /** @var User $user */
        $user = $this->getUser();
        $caisse = $user->getCaisse();

        if (!$caisse) {
            $this->addFlash('error', 'Aucune caisse n\'est associée à votre compte.');
            return $this->redirectToRoute('app_comptability_caisse_journee_close');
        }

        $billetage = (new Billetage())
            ->setJournee($active)
            ->setDate($active->getStartedAt())
            ->setReference($active->getUuid())
            ->setUser($user)
            ->setBalance($active->getSolde());

        $form = $this->createForm(JourneeCloseType::class, $billetage, [
            'caisse' => $caisse,
        ]);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($billetage);
            $manager->flush();

            return $this->redirectToRoute('billetage_inventaire_create', ['uuid' => $billetage->getUuid()]);
        }

        return $this->render('journee/close.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
