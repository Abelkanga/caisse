<?php
namespace App\Controller;

use App\Entity\JournalCaisse;
use App\Entity\RecuCaisse;
use App\Entity\Bonapprovisionnement;
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

class RecuCaisseController extends AbstractController
{
    #[Route('/recu-caisse/{uuid}', name: 'recu_caisse_show', methods: ['GET', 'POST'])]
    public function show(RecuCaisse $recuCaisse,
                         Request $request,
                         EntityManagerInterface $entityManager,
                         CaisseService $service,
                         JournalCaisseRepository $jcRepo,
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
            $bonapprovisionnement = $recuCaisse->getBonapprovisionnement();
            if (!$bonapprovisionnement) {
                $this->addFlash('error', 'Aucune fiche de besoin associée.');
                return $this->redirectToRoute('app_welcome');
            }

            if ($request->isMethod('POST') && $this->isCsrfTokenValid('validate-caisse-bonapprovisionnement', $request->request->get('_token'))) {
                if ($request->request->has('confirm_manager')) {
                    /** @var User $user */
                    $user = $this->getUser();
                    $caisse = $user->getCaisse();

                    $amount = $bonapprovisionnement->getMontanttotal();


                    $num_journalCaisse = $service->refJournalCaisse();

                    $lastSolde = $jcRepo->getLastSolde($caisse->getId());
                    $journalCaisse = new JournalCaisse();
                    $journalCaisse->setNumPiece($num_journalCaisse);
                    $journalCaisse->setDate(new \DateTime());
                    $journalCaisse->setCaisse($caisse);
                    $journalCaisse->setRecuCaisse($recuCaisse);
                    $journalCaisse->setEntree($amount);
                    $journalCaisse->setIntitule($bonapprovisionnement->getPorteur());
                    $journalCaisse->setSolde($lastSolde + $amount);
                    $journalCaisse->setBonapprovisionnement($bonapprovisionnement);



//                $caisse = $caisse->first();
                    $solde = $caisse->getSoldedispo();
                    $montanttotal = $bonapprovisionnement->getMontanttotal();
                    $caisse->setSoldedispo($solde + $montanttotal);
                    $bonapprovisionnement->setStatus(Status::CONVERT);
                    $recuCaisse->setStatus(Status::CONVERT);

                    $active = $journeeRepository->activeJournee();
                    $active->setDebit($amount + $active->getDebit())->setSolde($active->getDebit() - $active->getCredit());

                    // Persister les changements

                    $entityManager->persist($caisse);
                    $entityManager->persist($journalCaisse);
                    $entityManager->persist($bonapprovisionnement);
                    $entityManager->persist($recuCaisse);
                    $entityManager->persist($active);
                    $entityManager->flush();

                    flash()
                        ->options([
                            'timeout' => 5000, // 3 seconds
                            'position' => 'bottom-right',
                        ])
                        ->success('Recu de caisse convertit avec succès ! ');

                    return $this->redirectToRoute('app_welcome');
                }

            }
        }

        return $this->render('recu_caisse/show.html.twig', [
            'recuCaisse' => $recuCaisse,
            'operation_type' => 'encaissement',
        ]);
    }
}
