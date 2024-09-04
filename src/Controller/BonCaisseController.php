<?php

namespace App\Controller;

use App\Entity\BonCaisse;
use App\Entity\JournalCaisse;
use App\Entity\Fdb;
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

class BonCaisseController extends AbstractController
{
    #[Route('/bon-caisse/{uuid}', name: 'bon_caisse_show', methods: ['GET', 'POST'])]
    public function show(
        BonCaisse $bonCaisse,
        Request $request,
        EntityManagerInterface $entityManager,
        CaisseService $service,
        JournalCaisseRepository $jcRepository,
        JourneeRepository $journeeRepository
    ): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        if ($this->isGranted('ROLE_MANAGER')) {
            $caisse = $user->getCaisse();

            if (!$caisse) {
                // L'utilisateur manager n'est pas lié à une caisse
                $this->addFlash('error', 'Vous n\'êtes pas associé à une caisse.');

                return $this->redirectToRoute('app_welcome');
            }

            // Récupérer la fiche de besoin associée
            $fdb = $bonCaisse->getFdb();
            if (!$fdb) {
                $this->addFlash('error', 'Aucune fiche de besoin associée.');
                return $this->redirectToRoute('app_welcome');
            }

            if ($request->request->has('confirm_manager')) {
                $solde = $caisse->getSoldedispo();
                $total = $fdb->getTotal();

                if ($solde < $total) {

                    flash()
                        ->options([
                            'timeout' => 5000, // 3 seconds
                            'position' => 'bottom-right',
                        ])
                        ->error('Pas de fond disponible pour effectuer cette opération');

                    return $this->redirectToRoute('app_welcome');
                }

                $num_journalCaisse = $service->refJournalCaisse();

                $amount = $fdb->getTotal();

                $lastSolde = $jcRepository->getLastSolde($caisse->getId());
                $journalCaisse = (new JournalCaisse())
                    ->setNumPiece($num_journalCaisse)
                    ->setDate(new \DateTime())
                    ->setCaisse($caisse)
                    ->setBonCaisse($bonCaisse)
                    ->setSortie($fdb->getTotal())
                    ->setIntitule($fdb->getTypeExpense())
                    ->setSolde($lastSolde - $total)
                    ->setFdb($fdb);

                $caisse->setSoldedispo($solde - $total);
                $fdb->setStatus(Status::CONVERT);
                $bonCaisse->setStatus(Status::CONVERT);


                $active = $journeeRepository->activeJournee();
                $active->setCredit($amount + $active->getCredit())->setSolde($active->getDebit() - $active->getCredit());

                // Persister les changements

                $entityManager->persist($caisse);
                $entityManager->persist($fdb);
                $entityManager->persist($journalCaisse);
                $entityManager->persist($bonCaisse);
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

        return $this->render('bon_caisse/show.html.twig', [
            'bonCaisse' => $bonCaisse,
            'operation_type' => 'decaissement',
        ]);
    }
}
