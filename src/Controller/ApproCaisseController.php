<?php

namespace App\Controller;

use App\Entity\ApproCaisse;
use App\Entity\JournalCaisse;
use App\Entity\User;
use App\Form\ApproCaisseType;
use App\Repository\ApproCaisseRepository;
use App\Repository\CaisseRepository;
use App\Repository\JournalCaisseRepository;
use App\Repository\JourneeRepository;
use App\Service\CaisseService;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/approCaisse')]
class ApproCaisseController extends AbstractController
{
//    #[Route('/index', name: 'app_approcaisse_index', methods:['GET'])]
//    public function index(ApproCaisseRepository $approCaisseRepository): Response
//    {
//        return $this->render('ApproCaisse/index.html.twig', [
//            'approCaisses' => $approCaisseRepository->findAll(),
//
//        ]);
//    }

//    #[Route('/approCaisse', name: 'app_approcaisse_index', methods:['GET'])]
//    public function index(ApproCaisseRepository $approCaisseRepository): Response
//    {
//        /** @var User $user */
//        $user = $this->getUser();
//        $caisse = $user->getCaisse();
//
//        if (!$caisse) {
//            flash()->error('Aucune caisse associée à l\'utilisateur.');
//            return $this->redirectToRoute('app_welcome');
//        }
//
//        // Récupérer les approvisionnements où la caisse de l'utilisateur est soit émettrice, soit réceptrice
//        $approCaisses = $approCaisseRepository->findByCaisseEmettriceOrReceptrice($caisse);
//
//        return $this->render('ApproCaisse/index.html.twig', [
//            'approCaisses' => $approCaisses,
//        ]);
//    }


//    #[Route('/approCaisse', name: 'app_approcaisse_index', methods:['GET'])]
//    public function index(ApproCaisseRepository $approCaisseRepository): Response
//    {
//        /** @var User $user */
//        $user = $this->getUser();
//        $caisse = $user->getCaisse();
//
//        if (!$caisse) {
//            flash()->error('Aucune caisse associée à l\'utilisateur.');
//            return $this->redirectToRoute('app_welcome');
//        }
//
//        // Récupérer uniquement les approvisionnements où la caisse de l'utilisateur est la caisse émettrice
//        $approCaisses = $approCaisseRepository->findByCaisseEmettrice($caisse);
//
//        return $this->render('ApproCaisse/index.html.twig', [
//            'approCaisses' => $approCaisses,
//        ]);
//    }


    #[Route('/index', name: 'app_approcaisse_index', methods:['GET'])]
    public function index(ApproCaisseRepository $approCaisseRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $roles = $user->getRoles();

        // Si l'utilisateur a le rôle ROLE_IMPRESSION, il voit tous les approvisionnements
        if (in_array('ROLE_IMPRESSION', $roles)) {
            $approCaisses = $approCaisseRepository->findAll();
        } else {
            // Sinon, filtrer uniquement par les approvisionnements émis par la caisse de l'utilisateur
            $caisse = $user->getCaisse();

            if (!$caisse) {
                flash()->error('Aucune caisse associée à l\'utilisateur.');
                return $this->redirectToRoute('app_welcome');
            }

            $approCaisses = $approCaisseRepository->findByCaisseEmettrice($caisse);
        }

        return $this->render('ApproCaisse/index.html.twig', [
            'approCaisses' => $approCaisses,
        ]);
    }

    #[Route('/reception', name: 'app_approcaisse_reception', methods:['GET'])]
    public function indexReception(ApproCaisseRepository $approCaisseRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $caisse = $user->getCaisse();

        if ($caisse->getCode() !== 'C002') { // Assurer que c'est la caisse secondaire
            flash()->error('Accès refusé.');
            return $this->redirectToRoute('app_welcome');
        }

        // Récupérer les approvisionnements où la caisse de l'utilisateur est la caisse réceptrice
        $approCaisses = $approCaisseRepository->findByCaisseReceptrice($caisse);

        return $this->render('ApproCaisse/index.html.twig', [
            'approCaisses' => $approCaisses,
        ]);
    }

    #[Route('/new', name: 'app_approcaisse_new', methods:['GET','POST'])]
    public function new(Request $request,
                        EntityManagerInterface $manager,
                        CaisseRepository $caisseRepository,
                        CaisseService $service,
                        JourneeRepository $journeeRepository,
                        JournalCaisseRepository $jcRepo): Response
    {
        $activeJournee = $journeeRepository->activeJournee();
        if (!$activeJournee) {
            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->error('Vous devez ouvrir la caisse avant d\'approvisionner une autre caisse.');
            return $this->redirectToRoute('app_comptability_caisse_journee_open');
        }

        $num_approCaisse = $service->refApproCaisse();
        $approCaisse = (new ApproCaisse())
            ->setDate(new \DateTime())
            ->setReference($num_approCaisse)
            ->setObjet('Approvisionnement de caisse à caisse');

        $form = $this->createForm(ApproCaisseType::class, $approCaisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $caisseEmettrice = $approCaisse->getCaisseEmettrice(); // Caisse principale (émission)
            $caisseReceptrice = $approCaisse->getCaisseReceptrice(); // Caisse secondaire (réception)

            $montant = $approCaisse->getMontant();

            // Vérifications de base
            if (!$caisseEmettrice || !$caisseReceptrice) {
                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->error('Caisse émettrice ou réceptrice non définie.');
                return $this->redirectToRoute('app_approcaisse_new');
            }

            if ($caisseEmettrice->getSoldedispo() === null || $caisseEmettrice->getSoldedispo() < $montant) {
                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->error('Fonds insuffisants dans la caisse émettrice !');
                return $this->redirectToRoute('app_approcaisse_index');
            }

            // Récupérer les derniers soldes des deux caisses pour le journal
            $lastSoldeEmettrice = $jcRepo->getLastSolde($caisseEmettrice->getId());
            $lastSoldeReceptrice = $jcRepo->getLastSolde($caisseReceptrice->getId());

            // Récupérer le code de la caisse émettrice (ou réceptrice)
            $caisseCodeEmettrice = $caisseEmettrice->getCode(); // Par exemple, 'C001' ou 'C002'
            $caisseCodeReceptrice = $caisseReceptrice->getCode();

            // Générer la référence du journal de caisse pour chaque caisse
            $numJournalCaisseEmettrice = $service->refJournalCaisse($caisseCodeEmettrice);
            $numJournalCaisseReceptrice = $service->refJournalCaisse($caisseCodeReceptrice);

            // --------------------------
            // JournalCaisse pour la caisse émettrice (sortie)
            // --------------------------

            $journalCaisseEmettrice = new JournalCaisse();
            $journalCaisseEmettrice->setNumPiece($numJournalCaisseEmettrice);
            $journalCaisseEmettrice->setDate(new \DateTime());
            $journalCaisseEmettrice->setCaisse($caisseEmettrice);
            $journalCaisseEmettrice->setSortie($montant); // Enregistrement en sortie pour la caisse principale
            $journalCaisseEmettrice->setIntitule("Transfert à la caisse secondaire");
            $journalCaisseEmettrice->setSolde($lastSoldeEmettrice - $montant); // Calculer le nouveau solde
            $journalCaisseEmettrice->setApproCaisse($approCaisse);

            // Mettre à jour le solde de la caisse émettrice (débiter)
            $caisseEmettrice->setSoldedispo($caisseEmettrice->getSoldedispo() - $montant);

            // --------------------------
            // JournalCaisse pour la caisse réceptrice (entrée)
            // --------------------------

            $journalCaisseReceptrice = new JournalCaisse();
            $journalCaisseReceptrice->setNumPiece($numJournalCaisseReceptrice);
            $journalCaisseReceptrice->setDate(new \DateTime());
            $journalCaisseReceptrice->setCaisse($caisseReceptrice);
            $journalCaisseReceptrice->setEntree($montant); // Enregistrement en entrée pour la caisse secondaire
            $journalCaisseReceptrice->setIntitule("Réception de la caisse principale");
            $journalCaisseReceptrice->setSolde($lastSoldeReceptrice + $montant); // Calculer le nouveau solde
            $journalCaisseReceptrice->setApproCaisse($approCaisse);


            $caisseReceptrice->setSoldedispo($caisseReceptrice->getSoldedispo() + $montant);

            // --------------------------
            // Mise à jour des journées actives
            // --------------------------

            // Mise à jour de la journée de la caisse émettrice (ajout au débit)
            $journeeEmettrice = $journeeRepository->activeJournee($caisseEmettrice->getId());
            if ($journeeEmettrice) {
                $journeeEmettrice->setDebit($journeeEmettrice->getDebit() - $montant);
                $journeeEmettrice->setCredit($journeeEmettrice->getCredit() + $montant);
                $newSoldeEmettrice = $journeeEmettrice->getDebit() - $journeeEmettrice->getCredit();
                $journeeEmettrice->setSolde($newSoldeEmettrice);
            }

            // Mise à jour de la journée de la caisse réceptrice (ajout au crédit)
            $journeeReceptrice = $journeeRepository->activeJournee($caisseReceptrice->getId());
            if ($journeeReceptrice) {

                $journeeReceptrice->setDebit($journeeReceptrice->getDebit() + $montant);

                $newSoldeReceptrice = $journeeReceptrice->getDebit() - $journeeReceptrice->getCredit();
                $journeeReceptrice->setSolde($newSoldeReceptrice);
            }

            $approCaisse->setUser($user)
                ->setStatus(Status::VALIDATED)
                ->setJournee($activeJournee)
                ->setCaisseEmettrice($caisseEmettrice)
                ->setCaisseReceptrice($caisseReceptrice);

            // Persister les changements dans la base de données
            $manager->persist($caisseEmettrice);
            $manager->persist($journalCaisseEmettrice);
            $manager->persist($caisseReceptrice);
            $manager->persist($journalCaisseReceptrice);
            $manager->persist($journeeEmettrice);
            $manager->persist($journeeReceptrice);
            $manager->persist($approCaisse);
            $manager->flush();

            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->success('Transfert effectué avec succès !');

            return $this->redirectToRoute('app_approcaisse_index');
        }

        return $this->render('ApproCaisse/new.html.twig', [
            'form' => $form->createView(),
            'approCaisse' => $approCaisse,
        ]);
    }


    #[Route('/{id}/show', name: 'app_approcaisse_show', methods: ['GET', 'POST'])]
    public function show(ApproCaisse $approCaisse,
                         Request $request,
                         EntityManagerInterface $entityManager): Response
    {

        return $this->render('ApproCaisse/show.html.twig', [
            'approCaisses' => $approCaisse,
        ]);

    }


    #[Route('/{id}/print', name: 'print_approCaisse', methods: ['GET'])]
    public function print(ApproCaisse $approCaisse ): Response
    {
        return $this->render('ApproCaisse/print.html.twig', [
            'approCaisses' => $approCaisse,
        ]);
    }
}
