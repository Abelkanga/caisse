<?php

namespace App\Controller;

use App\Entity\ApproCaisse;
use App\Entity\User;
use App\Form\ApproCaisseType;
use App\Repository\ApproCaisseRepository;
use App\Repository\CaisseRepository;
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
    #[Route('/index', name: 'app_approcaisse_index', methods:['GET'])]
    public function index(ApproCaisseRepository $approCaisseRepository): Response
    {
        return $this->render('ApproCaisse/index.html.twig', [
            'approCaisses' => $approCaisseRepository->findAll(),

        ]);
    }


    #[Route('/new', name: 'app_approcaisse_new', methods:['GET','POST'])]
    public function new(Request $request,
                        EntityManagerInterface $manager,
                        CaisseRepository $caisseRepository,
                        CaisseService $service,
                        JourneeRepository $journeeRepository): Response
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
            $caisse = $user->getCaisse();

            // Récupérer les caisses et le montant
            $caisseEmettrice = $approCaisse->getCaisseEmettrice();
            $caisseReceptrice = $approCaisse->getCaisseReceptrice();
            $montant = $approCaisse->getMontant();


            // Vérifier que la caisse émettrice est bien définie
            $caisseEmettrice = $approCaisse->getCaisseEmettrice();
            if (!$caisseEmettrice) {


                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->error('Caisse émettrice non définie.!');

                return $this->redirectToRoute('app_approcaisse_new');
            }

            $caisseReceptrice = $approCaisse->getCaisseReceptrice();
            $montant = $approCaisse->getMontant();

// Vérifier les fonds de la caisse émettrice
            if ($caisseEmettrice->getSoldedispo() === null || $caisseEmettrice->getSoldedispo() < $montant) {


                flash()
                    ->options([
                        'timeout' => 5000,
                        'position' => 'bottom-right',
                    ])
                    ->error('Fonds insuffisants dans la caisse émettrice !');


                return $this->redirectToRoute('app_approcaisse_index');
            }


            // Mettre à jour les soldes
            $caisseEmettrice->setSoldedispo($caisseEmettrice->getSoldedispo() - $montant);
            $caisseReceptrice->setSoldedispo($caisseReceptrice->getSoldedispo() + $montant);

            // Associer l'utilisateur et le statut à l'ApproCaisse
            $approCaisse
                ->setUser($user)
                ->setStatus(Status::VALIDATED)
                ->setJournee($activeJournee)
                ->setCaisseEmettrice($caisseEmettrice)
            ;

            // Persister les changements
            $manager->persist($caisseEmettrice);
            $manager->persist($caisseReceptrice);
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
