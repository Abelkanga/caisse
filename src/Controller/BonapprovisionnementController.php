<?php

namespace App\Controller;

use App\Entity\Bonapprovisionnement;
use App\Entity\BonCaisse;
use App\Entity\User;
use App\Form\BonapprovisionnementType;
use App\Repository\BonapprovisionnementRepository;
use App\Service\CaisseService;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


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
    public function new(Request $request, EntityManagerInterface $entityManager, CaisseService $service): Response
    {
        $bonapprovisionnement = new Bonapprovisionnement();

        $form = $this->createForm(BonapprovisionnementType::class, $bonapprovisionnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $bonapprovisionnement->setUser($user)->setStatus(Status::EN_ATTENTE);

            $detail = $bonapprovisionnement->getDetails();
            foreach ($detail as $d) {
                $d->setBonapprovisionnement($bonapprovisionnement);

                $entityManager->persist($d);
            }

            $entityManager->persist($bonapprovisionnement);
            $entityManager->flush();
            flash()->success('Bon d approvisionnement créé avec succès !');
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
            if($request->request->has('confirm')) {
                /** @var User $user */
                $user = $this->getUser();
                $caisse = $user->getCaisse();
                $solde = $caisse->getSoldedispo();
                $total = $bonapprovisionnement->getTotal();
                $caisse->setSoldedispo($solde + $total);
                $bonapprovisionnement->setStatus(Status::VALIDATED);

                $bonCaisse = new BonCaisse();
                $bonCaisse->setStatus(Status::VALIDATED);
                $bonCaisse->setDate(new \DateTime());
                $bonCaisse->setMontant($bonapprovisionnement->getTotal());
                $bonCaisse->setCaisse($caisse);
                $bonCaisse->setBonapprovisionnement($bonapprovisionnement);
                $entityManager->persist($bonCaisse);



                $entityManager->persist($bonapprovisionnement);
                $entityManager->persist($caisse);

                $entityManager->flush();

                return $this->redirectToRoute('app_welcome');

            }
        }


        return $this->render('bonapprovisionnement/show.html.twig', [
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
            flash()->success('Bon d approvisionnement modifié avec succès !');
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
        flash()->success('Bon d approvisionnement supprimé avec succès !');
        return $this->redirectToRoute('bonapprovisionnement_index');
    }

}
