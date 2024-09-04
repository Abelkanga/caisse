<?php

namespace App\Controller;

use App\Entity\Bonapprovisionnement;
use App\Entity\BonCaisse;
use App\Entity\Journee;
use App\Entity\RecuCaisse;
use App\Entity\User;
use App\Form\BonapprovisionnementType;
use App\Form\CaisseType;
use App\Form\RecuCaisseType;
use App\Repository\BonapprovisionnementRepository;
use App\Repository\JourneeRepository;
use App\Repository\RecuCaisseRepository;
use App\Service\CaisseService;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Uid\Uuid;


class BonapprovisionnementController extends AbstractController
{
    #[Route('/bonapprovisionnement', name: 'bonapprovisionnement_index', methods:['GET'])]
    public function index(BonapprovisionnementRepository $bonapprovisionnementRepository): Response
    {
        $bonapprovisionnement = $bonapprovisionnementRepository->findAll();

        return $this->render('bonapprovisionnement/index.html.twig', [
            'bonapprovisionnement' => $bonapprovisionnement,
        ]);
    }

    #[Route('/bonapprovisionnement/pending', name: 'bon_app_pending', methods:['GET'])]
    public function index_pending(BonapprovisionnementRepository $bonapprovisionnementRepository): Response
    {
        $bonapprovisionnement = $bonapprovisionnementRepository->findBonPending();

        return $this->render('bonapprovisionnement/index.html.twig', [
            'bonapprovisionnement' => $bonapprovisionnement
        ]);
    }

    #[Route('/bonapprovisionnement/validate', name: 'bonapprovisionnement_validate', methods:['GET'])]
    public function index_validated(BonapprovisionnementRepository $bonapprovisionnementRepository): Response
    {
        $bonapprovisionnement = $bonapprovisionnementRepository->findBonValidate();

        return $this->render('bonapprovisionnement/index.html.twig', [
            'bonapprovisionnement' => $bonapprovisionnement
        ]);
    }

    #[Route('/bonapprovisionnement/new', name: 'bonapprovisionnement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, CaisseService $service, JourneeRepository $journeeRepository): Response
    {
        $activeJournee = $journeeRepository->activeJournee();
        if (!$activeJournee) {
            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->error('Vous devez ouvrir la caisse avant de créer un bon d\'approvisionnement.');
            return $this->redirectToRoute('app_comptability_caisse_journee_open');
        }

        $num_bonapprovisionnement = $service->refBonApprovisionnement();
        $bonapprovisionnement = (new Bonapprovisionnement())->setReference($num_bonapprovisionnement);

        $form = $this->createForm(BonapprovisionnementType::class, $bonapprovisionnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $caisse = $user->getCaisse(); // Obtenir la caisse de l'utilisateur connecté

            if (!$caisse) {
                flash()->error('Aucune caisse associée à l\'utilisateur.');
                return $this->redirectToRoute('bonapprovisionnement_new');
            }

            $bonapprovisionnement
                ->setUser($user)
                ->setCaisse($caisse) // Associer la caisse
                ->setStatus(Status::EN_ATTENTE);

            $entityManager->persist($bonapprovisionnement);
            $entityManager->flush();

            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->success('Bon d\'approvisionnement créé avec succès !');

            return $this->redirectToRoute('bonapprovisionnement_index');
        }

        return $this->render('bonapprovisionnement/new.html.twig', [
            'bonapprovisionnement' => $bonapprovisionnement,
            'form' => $form->createView(),
        ]);
    }


    #[Route('/bonapprovisionnement/{id}/show', name: 'bonapprovisionnement_show', methods: ['GET', 'POST'])]
    public function show(Bonapprovisionnement $bonapprovisionnement, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST') && $this->isCsrfTokenValid('validate-caisse-bonapprovisionnement', $request->request->get('_token'))) {
            if($request->request->has('confirm_manager')) {
                /** @var User $user */
                $user = $this->getUser();
                $caisse = $user->getCaisse();
//                $caisse = $caisse->first();
                $solde = $caisse->getSoldedispo();
                $montanttotal = $bonapprovisionnement->getMontanttotal();
                $caisse->setSoldedispo($solde + $montanttotal);
                $bonapprovisionnement->setStatus(Status::CONVERT);


                $recuCaisse = new RecuCaisse();
                $recuCaisse->setStatus(Status::CONVERT);
                $recuCaisse->setDate(new \DateTime());
                $recuCaisse->setMontant($bonapprovisionnement->getMontanttotal());
                $recuCaisse->setCaisse($caisse);
                $recuCaisse->setBonapprovisionnement($bonapprovisionnement);
                $entityManager->persist($recuCaisse);

                $entityManager->persist($bonapprovisionnement);
                $entityManager->persist($caisse);

                $entityManager->flush();

                return $this->redirectToRoute('app_welcome');

            }
        }

        return $this->render('bonapprovisionnement/show.html.twig', [
            'bonapprovisionnement' => $bonapprovisionnement,
            'operation_type' => 'encaissement', // ajout de cette variable
        ]);

    }

    #[Route('/bonapprovisionnement/{uuid}/convert', name: 'bonapprovisionnement_convert', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_MANAGER')]
    public function convert(
        Bonapprovisionnement $bonapprovisionnement,
        BonapprovisionnementRepository $bonapprovisionnementRepository,
        RecuCaisseRepository $recuCaisseRepository,
        Request $request,
        EntityManagerInterface $entityManager,
        CaisseService $service
    ): Response
    {
        // Récupération de la caisse liée au manager
        /** @var User $user */
        $user = $this->getUser();
        $caisse = $user->getCaisse();

        if (!$caisse) {
            $this->addFlash('error', 'Vous n\'êtes pas associé à une caisse.');
            return $this->redirectToRoute('bonapprovisionnement_show', ['uuid' => $bonapprovisionnement->getUuid()]);
        }

        // Générer la référence du bon de caisse
        $num_recu = $service->refRecuCaisse();

        // Création du bon de caisse
        $recuCaisse = (new RecuCaisse())
            ->setReference($num_recu)
            ->setDate(new \DateTime())
            ->setStatus(Status::EN_ATTENTE)
            ->setBeneficiaire($bonapprovisionnement->getDestinataire())
            ->setBonapprovisionnement($bonapprovisionnement)
            ->setMontant($bonapprovisionnement->getMontanttotal())
            ->setCaisse($caisse);

        // L'UUID est généré automatiquement dans le constructeur ou ici manuellement si nécessaire
        if (!$recuCaisse->getUuid()) {
            $recuCaisse->setUuid(Uuid::v4());
        }

        // Création et gestion du formulaire
        $form = $this->createForm(RecuCaisseType::class, $recuCaisse, [
            'bonapprovisionnement' => $bonapprovisionnement,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Mise à jour du bon de caisse

            // Mise à jour du statut de la fiche de besoin
            $bonapprovisionnement->setStatus(Status::CONVERT);

            // Enregistrement dans la base de données
            $entityManager->persist($recuCaisse);
            $entityManager->persist($bonapprovisionnement);
            $entityManager->flush();

            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Reçu de caisse enregistré avec succès.');

            // Redirection vers la vue show du bon de caisse
            return $this->redirectToRoute('recu_caisse_show', [
                'uuid' => $recuCaisse->getUuid()
            ], Response::HTTP_SEE_OTHER);
        }

        // Affichage du formulaire sur la vue show de la fiche de besoin
        return $this->render('recu_caisse/new.html.twig', [
            'form' => $form->createView(),
            'bonapprovisionnement' => $bonapprovisionnement,
        ]);
    }

    #[Route('/bonapprovisionnement/{id}/edit', name: 'bonapprovisionnement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bonapprovisionnement $bonapprovisionnement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BonapprovisionnementType::class, $bonapprovisionnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
//            flash()->success('Bon d approvisionnement modifié avec succès !');

            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Bon d approvisionnement modifié avec succès !');


            return $this->redirectToRoute('bonapprovisionnement_index');
        }

        return $this->render('bonapprovisionnement/edit.html.twig', [
            'bonapprovisionnement' => $bonapprovisionnement,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/bonapprovisionnement/{uuid}/print', name: 'print_bon', methods: ['GET'])]
    public function print(Bonapprovisionnement $bonapprovisionnement ): Response
    {
        return $this->render('bonapprovisionnement/print.html.twig', [
            'bonapprovisionnement' => $bonapprovisionnement,
        ]);
    }

    #[Route('/bonapprovisionnement/{id}/delete', name: 'bonapprovisionnement_delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $entityManager, Bonapprovisionnement $bonapprovisionnement, ): Response
    {
        $entityManager->remove($bonapprovisionnement);
        $entityManager->flush();

        flash()
            ->options([
                'timeout' => 5000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->success('Bon d approvisionnement supprimé avec succès !');

//        flash()->success('Bon d approvisionnement supprimé avec succès !');
        return $this->redirectToRoute('bonapprovisionnement_index');
    }

}
