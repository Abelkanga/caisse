<?php

namespace App\Controller;

use App\Entity\BackCash;
use App\Entity\BonCaisse;
use App\Entity\BonMission;
use App\Entity\Depense;
use App\Entity\JournalCaisse;
use App\Entity\User;
use App\Form\BackCashType;
use App\Repository\BonCaisseRepository;
use App\Repository\BonMissionRepository;
use App\Repository\JournalCaisseRepository;
use App\Repository\JourneeRepository;
use App\Service\CaisseService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackCashController extends AbstractController
{
    #[Route('/index', name: 'back_cash_index', methods:['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $backCash = $entityManager->getRepository(BackCash::class)->findAll();

        return $this->render('back_cash/index.html.twig', [
            'backCash' => $backCash,
        ]);
    }

    #[Route('/get-references', name: 'back_cash_reference', methods: ['GET'])]
    public function getReferences(Request $request, BonMissionRepository $bonMissionRepo, BonCaisseRepository $bonCaisseRepo): JsonResponse
    {
        $type = $request->query->get('type');
        $references = [];

        if ($type === 'bon_mission') {
            $bons = $bonMissionRepo->findAll();
        } elseif ($type === 'bon_caisse') {
            $bons = $bonCaisseRepo->findAll();
        }

        foreach ($bons as $bon) {
            $references[] = [
                'reference' => $bon->getReference(),
                'montant' => $bon->getMontant(),
            ];
        }

        return new JsonResponse($references);
    }

    #[Route('/back-cash/new', name: 'back_cash_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        CaisseService $service,
        JournalCaisseRepository $jcRepository,
        JourneeRepository $journeeRepository,

    ): Response {
        /** @var User $user */
        $user = $this->getUser();

        // Vérifier si l'utilisateur a une caisse associée
        $caisse = $user->getCaisse();
        if (!$caisse) {
            $this->addFlash('error', 'Vous n\'êtes pas associé à une caisse.');
            return $this->redirectToRoute('app_welcome');
        }

        $refBack = $service->refBackCash();

        $backCash = (new BackCash())->setStatus('en attente')->setDate(new \DateTime())->setReference($refBack);
        $form = $this->createForm(BackCashType::class, $backCash);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $montantRetour = $backCash->getMontantRetour();
            $typeDepense = $form->get('typeDepense')->getData();
            $reference = $form->get('referenceDepense')->getData();

            // Vérifier si la référence existe
            if ($typeDepense === 'bon_mission') {
                $bonMission = $entityManager->getRepository(BonMission::class)->findOneBy(['reference' => $reference]);
                if (!$bonMission) {
//                    $this->addFlash('error', 'Bon de mission introuvable.');

                    flash()
                        ->options(['timeout' => 5000, 'position' => 'bottom-right'])
                        ->error('Bon de mission introuvable.');

                    return $this->redirectToRoute('back_cash_new');
                }
                $montantSortie = $bonMission->getTotal();
            } elseif ($typeDepense === 'bon_caisse') {
                $bonCaisse = $entityManager->getRepository(BonCaisse::class)->findOneBy(['reference' => $reference]);
                if (!$bonCaisse) {
//                    $this->addFlash('error', 'Bon de caisse introuvable.');

                    flash()
                        ->options(['timeout' => 5000, 'position' => 'bottom-right'])
                        ->error('Bon de caisse introuvable.');

                    return $this->redirectToRoute('back_cash_new');
                }
                $montantSortie = $bonCaisse->getMontant();
            } else {
//                $this->addFlash('error', 'Type de dépense invalide.');

                flash()
                    ->options(['timeout' => 5000, 'position' => 'bottom-right'])
                    ->error('Type de dépense invalide.');

                return $this->redirectToRoute('back_cash_new');
            }

            // Vérifier que le montant retourné est valide
            if ($montantRetour <= 0 || $montantRetour > $montantSortie) {
//                $this->addFlash('error', 'Le montant retourné est invalide.');

                flash()
                    ->options(['timeout' => 5000, 'position' => 'bottom-right'])
                    ->error('Le montant retourné est invalide.');

                return $this->redirectToRoute('back_cash_new');
            }

            // Mettre à jour le solde de la caisse
            $nouveauSolde = $caisse->getSoldedispo() + $montantRetour;
            $caisse->setSoldedispo($nouveauSolde);

            // Enregistrer le retour de fonds
            $backCash->setCaisse($caisse);
            $backCash->setUser($user);
            $backCash->setReference($reference);
//            $backCash->setBonCaisse($bonCaisse);
//            $backCash->setBonMission($bonMission);
            $backCash->setDate(new \DateTime());
            $backCash->setStatus('Validée');

//            $entityManager->persist($bonCaisse);
//            $entityManager->persist($bonMission);
            $entityManager->persist($backCash);

            $caisseCode = $caisse->getCode();

            $num_journalCaisse = $service->refJournalCaisse($caisseCode);

            $lastSolde = $jcRepository->getLastSolde($caisse->getId());


            $intitule = 'Retour de fond - ';

            if ($typeDepense === 'bon_mission') {
                $bonMission = $entityManager->getRepository(BonMission::class)->findOneBy(['reference' => $reference]);
                if (!$bonMission) {
                    flash()->options(['timeout' => 5000, 'position' => 'bottom-right'])->error('Bon de mission introuvable.');
                    return $this->redirectToRoute('back_cash_new');
                }
                $montantSortie = $bonMission->getTotal();
                $intitule .= 'Bon de mission (Réf: ' . $bonMission->getReference() . ')';
            } elseif ($typeDepense === 'bon_caisse') {
                $bonCaisse = $entityManager->getRepository(BonCaisse::class)->findOneBy(['reference' => $reference]);
                if (!$bonCaisse) {
                    flash()->options(['timeout' => 5000, 'position' => 'bottom-right'])->error('Bon de caisse introuvable.');
                    return $this->redirectToRoute('back_cash_new');
                }
                $montantSortie = $bonCaisse->getMontant();
                $intitule .= 'Bon de caisse (Réf: ' . $bonCaisse->getReference() . ')';
            } else {
                flash()->options(['timeout' => 5000, 'position' => 'bottom-right'])->error('Type de dépense invalide.');
                return $this->redirectToRoute('back_cash_new');
            }

//            // Ajouter une entrée dans le journal de caisse
            $journal = (new JournalCaisse())
                ->setNumPiece($num_journalCaisse)
                ->setDate(new \DateTime())
                ->setCaisse($caisse)
                ->setBackClash($backCash)
                ->setEntree($montantRetour)
//                ->setIntitule('Retour de fond')
                ->setIntitule($intitule) // Personnalisation ici
                ->setSolde($lastSolde + $montantRetour)
                ->setDate(new \DateTime())
            ;

            $entityManager->persist($journal);

            // Sauvegarde en base de données
            $entityManager->flush();

//            $this->addFlash('success', 'Retour de fonds enregistré avec succès.');

            flash()
                ->options(['timeout' => 5000, 'position' => 'bottom-right'])
                ->success('Retour de fonds enregistré avec succès.');

            return $this->redirectToRoute('app_welcome');
        }

        return $this->render('back_cash/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}