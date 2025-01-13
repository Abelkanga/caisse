<?php

namespace App\Controller;

use App\Entity\BonCaisse;
use App\Entity\BonMission;
use App\Entity\JournalCaisse;
use App\Entity\Fdb;
use App\Entity\OrderMission;
use App\Entity\User;
use App\Repository\JournalCaisseRepository;
use App\Repository\JourneeRepository;
use App\Service\CaisseService;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BonMissionController extends AbstractController
{
    #[Route('/bon-mission', name: 'bon_mission_index', methods:['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $bonMission = $entityManager->getRepository(BonMission::class)->findAll();

        return $this->render('bon_mission/index.html.twig', [
            'bonMission' => $bonMission,
        ]);
    }

    #[Route('/bon-mission-convertis', name: 'bon_mission_converted', methods: ['GET'])]
    public function converted(EntityManagerInterface $entityManager): Response
    {
        $bonMission = $entityManager->getRepository(BonMission::class)->findConverted();

        return $this->render('bon_mission/index.html.twig', [
            'bonMission' => $bonMission,
        ]);
    }


    #[Route('/bon-mission/{id}', name: 'bon_mission_show', methods: ['GET', 'POST'])]
    public function show(
       BonMission  $bonMission,
        Request $request,
        EntityManagerInterface $entityManager,
        CaisseService $service,
        JournalCaisseRepository $jcRepository,
        JourneeRepository $journeeRepository
    ): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $total = 0;
        foreach ($bonMission->getDetailBonMission() as $detail) {
            $montant = $detail->getMontant();
            if ($montant) {
                $total += $montant;
            }
        }




        if ($this->isGranted('ROLE_MANAGER')) {
            $caisse = $user->getCaisse();

            if (!$caisse) {
                // L'utilisateur manager n'est pas lié à une caisse
                $this->addFlash('error', 'Vous n\'êtes pas associé à une caisse.');

                return $this->redirectToRoute('app_welcome');
            }

            // Récupérer la fiche de besoin associée
            $orderMission = $bonMission->getOrderMission();
            if (!$orderMission) {
                $this->addFlash('error', 'Aucune fiche de besoin associée.');
                return $this->redirectToRoute('app_welcome');
            }

            if ($request->request->has('confirm_order_manager')) {

                $total = $bonMission->getTotal();
                $solde = $caisse->getSoldedispo();

                if ($solde < $total) {

                    flash()
                        ->options([
                            'timeout' => 5000, // 3 seconds
                            'position' => 'bottom-right',
                        ])
                        ->error('Pas de fond disponible pour effectuer cette opération');

                    return $this->redirectToRoute('app_welcome');
                }

                $caisseCode = $caisse->getCode();

                $num_journalCaisse = $service->refJournalCaisse($caisseCode);

                $amount = $bonMission->getTotal();

                $lastSolde = $jcRepository->getLastSolde($caisse->getId());
                $journalCaisse = (new JournalCaisse())
                    ->setNumPiece($num_journalCaisse)
                    ->setDate(new \DateTime())
                    ->setCaisse($caisse)
                    ->setBonMission($bonMission)
                    ->setSortie($bonMission->getTotal())
                    ->setIntitule($orderMission->getFullName())
                    ->setSolde($lastSolde - $total)
                    ->setOrderMission($orderMission)
                ;


                $caisse->setSoldedispo($solde - $total);
                $orderMission->setStatus(Status::CONVERT);
                $bonMission->setStatus(Status::CONVERT);


                $active = $journeeRepository->activeJournee();
                $active->setCredit($amount + $active->getCredit())->setSolde($active->getDebit() - $active->getCredit());

                // Persister les changements

                $entityManager->persist($caisse);
                $entityManager->persist($orderMission);
                $entityManager->persist($journalCaisse);
                $entityManager->persist($bonMission);
                $entityManager->persist($active);
                $entityManager->flush();

                
                flash()
                    ->options([
                        'timeout' => 5000, // 3 seconds
                        'position' => 'bottom-right',
                    ])
                    ->success('Bon de caisse convertit avec succès ! ');

                return $this->redirectToRoute('app_welcome');
            }

        }

        return $this->render('bon_mission/show.html.twig', [
            'bonMission' => $bonMission,
            'total' => $total,
        ]);
    }

    #[Route('/bon-mission/{id}/print', name: 'bon_mission_print', methods: ['GET'])]
    public function print(BonMission $bonMission, OrderMission $orderMission) : Response {

        return $this->render('bon_mission/print.html.twig', [
            'bonMission' => $bonMission,
            'orderMission' => $orderMission

        ]);
    }



}
