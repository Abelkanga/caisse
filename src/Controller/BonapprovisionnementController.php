<?php

namespace App\Controller;

use App\Entity\Bonapprovisionnement;
use App\Entity\User;
use App\Form\BonapprovisionnementType;
use App\Repository\BonapprovisionnementRepository;
use App\Service\PdfService;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class BonapprovisionnementController extends AbstractController
{

    #[Route('/bonapprovisionnement', name: 'bonapprovisionnement_index', methods:['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $bonapprovisionnement = $entityManager->getRepository(Bonapprovisionnement::class)->findAll();

        return $this->render('bonapprovisionnement/index.html.twig', [
            'bonapprovisionnement' => $bonapprovisionnement,
        ]);
    }

    #[Route('/bonapprovisionnement/pending', name: 'bon_app_pending', methods:['GET'])]
    public function index_pending(BonapprovisionnementRepository $bonapprovisionnementRepository): Response
    {
        $bonapp = $bonapprovisionnementRepository->findBonPending();

        return $this->render('bonapprovisionnement/index.html.twig', [
            'bon_app' => $bonapp
        ]);
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/bonapprovisionnement/new', name: 'bonapprovisionnement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bonapprovisionnement = new Bonapprovisionnement();

        $form = $this->createForm(BonapprovisionnementType::class, $bonapprovisionnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $bonapprovisionnement->setUser($this->getUser())->setStatus(Status::EN_ATTENTE);


            $detail = $bonapprovisionnement->getDetails();
            foreach ($detail as $d) {
                $d->setBonapprovisionnement($bonapprovisionnement);

                $entityManager->persist($d);
            }


            $entityManager->persist($bonapprovisionnement);
            $entityManager->flush();

            return $this->redirectToRoute('bonapprovisionnement_index');
        }

        return $this->render('bonapprovisionnement/new.html.twig', [
            'bonapprovisionnement' => $bonapprovisionnement,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/bonapprovisionnement/{id}/show', name: 'bonapprovisionnement_show', methods: ['GET', 'POST'])]
    public function show(Bonapprovisionnement $bonapprovisionnement): Response
    {
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

            return $this->redirectToRoute('bonapprovisionnement_index');
        }

        return $this->render('bonapprovisionnement/edit.html.twig', [
            'bonapprovisionnement' => $bonapprovisionnement,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/bonapprovisionnement/{id}/pdf', name: 'bonapprovisionnement_pdf', methods: ['GET', 'POST'])]
    public function pdf($id, EntityManagerInterface $entityManager, PdfService $pdfService,): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $bonapprovisionnementRepository = $entityManager->getRepository(Bonapprovisionnement::class);
        $bonapprovisionnement = $bonapprovisionnementRepository->find($id);

        if (!$bonapprovisionnement) {
            throw $this->createNotFoundException('Le bon d\'approvisionnement demandé n\'existe pas');
        }

        $pdfService->generatePdf('bonapprovisionnement/pdf.html.twig', [
            'bonapprovisionnement' => $bonapprovisionnement
        ]);

        return $this->redirectToRoute('bonapprovisionnement_index');
    }

    #[Route('/bonapprovisionnement/{id}/delete', name: 'bonapprovisionnement_delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $entityManager, Bonapprovisionnement $bonapprovisionnement, ): Response
    {
        $entityManager->remove($bonapprovisionnement);
        $entityManager->flush();

        return $this->redirectToRoute('bonapprovisionnement_index');
    }

}
