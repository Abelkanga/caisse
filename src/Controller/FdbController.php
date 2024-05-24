<?php

namespace App\Controller;

use App\Entity\Fdb;
use App\Entity\User;
use App\Form\FdbType;
use App\Repository\FdbRepository;
use App\Service\CaisseService;
use App\Service\PdfService;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FdbController extends AbstractController
{
    #[Route('/fdb', name: 'fdb_index', methods:['GET'])]
    public function index( FdbRepository $fdbRepository): Response
    {
        $fdb = $fdbRepository->findAll();

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }


    #[Route('/fdb/pending', name: 'fdb_pending', methods:['GET'])]
    public function index_pending(FdbRepository $fdbRepository): Response
    {
        $fdb = $fdbRepository->findFdbPending();

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }

    #[Route('/fdb/validate', name: 'fdb_validate', methods:['GET'])]
    public function index_validated(FdbRepository $fdbRepository): Response
    {
        $fdb = $fdbRepository->findFdbValidate();

        return $this->render('fdb/index.html.twig', [
            'fdb' => $fdb
        ]);
    }

    #[Route('/fdb/new', name: 'fdb_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, CaisseService $service): Response
    {
        $num_fdb = $service->refFdb();
        $fdb = (new Fdb())->setNumeroFicheBesoin($num_fdb);

        $form = $this->createForm(FdbType::class, $fdb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $fdb->setUser($user)->setStatus(Status::EN_ATTENTE);

            $detail = $fdb->getDetails();
            foreach ($detail as $d) {
                $d->setFdb($fdb);

                $entityManager->persist($d);
            }

            $entityManager->persist($fdb);
            $entityManager->flush();
            $this->addFlash('success','Fiche de besoin enregistré avec succès');
            return $this->redirectToRoute('fdb_index');
        }

        return $this->render('fdb/new.html.twig', [
            'fdb' => $fdb,
            'form' => $form->createView(),
        ]);
    }

    #[Route("/fdb/{id}/show", name:'fdb_show', methods: ['GET', 'POST'])]
    public function show(Fdb $fdb, Request $request, EntityManagerInterface $entityManager): Response
    {

        if ($request->isMethod('POST') && $this->isCsrfTokenValid('validate-caisse-fdb', $request->request->get('_token'))) {
            if($request->request->has('confirm')) {
                /** @var User $user */
                $user = $this->getUser();
                $caisse = $user->getCaisse();
                $solde = $caisse->getSoldedispo();
                $total = $fdb->getTotal();
                $caisse->setSoldedispo($solde - $total);
                $fdb->setStatus(Status::VALIDATED);

                $entityManager->persist($fdb);
                $entityManager->persist($caisse);

                $entityManager->flush();
                $this->addFlash('success','Fiche de besoin enregistré avec succès');
                return $this->redirectToRoute('app_welcome');

            }
        }


        return $this->render('fdb/show.html.twig', [
            'fdb' => $fdb,

        ]);
    }



    #[Route('/fdb/{id}/edit', name:'fdb_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fdb $fdb, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FdbType::class, $fdb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('fdb_index');
        }

        return $this->render('fdb/edit.html.twig', [
            'fdb' => $fdb,
            'form' => $form->createView(),
        ]);
    }
    #[Route('/fdb/{id}/pdf', name:'fdb_pdf', methods: ['GET', 'POST'])]
    public function pdf($id, EntityManagerInterface $entityManager, PdfService $pdfService): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $fdbRepository = $entityManager->getRepository(Fdb::class);
        $fdb = $fdbRepository->find($id);

        if (!$fdb) {
            throw $this->createNotFoundException('La fiche de besoin demandée n\'existe pas');
        }

        $pdfService->generatePdf('fdb/pdf.html.twig', [
            'fdb' => $fdb
        ]);

        return $this->redirectToRoute('fdb_index');
    }


    #[Route('/fdb/{id}/delete', name: 'fdb_delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $manager, Fdb $fdb) : Response
    {
        $manager->remove($fdb);
        $manager->flush();

        return $this->redirectToRoute('fdb_index');
    }

}
