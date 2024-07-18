<?php

namespace App\Controller;

use App\Entity\Billetage;
use App\Entity\Journee;
use App\Entity\User;
use App\Form\BilletageType;
use App\Repository\JourneeRepository;
use App\Utils\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/billetage/inventaire", name: "billetage_inventaire_")]
class BilletageController extends AbstractController
{
    #[Route('/', name: 'create')]
    public function index(
        Request                $request,
        EntityManagerInterface $manager,
        JourneeRepository  $journeeRepository,
    ): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $caisse = $user->getCaisse();

        $billetage = (new Billetage())
            ->setBalance($caisse->getSoldedispo());
        $form = $this->createForm(BilletageType::class, $billetage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $billetage
                ->setCaisse($caisse);
            $manager->persist($billetage);
            $manager->flush();
            $this->addFlash('success', 'Inventaire enregistré avec succes');
            return $this->redirectToRoute('billetage_inventaire_show');
        }

        return $this->render('billetage/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{uuid}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(
        Billetage              $billetage,
        Request                $request,
        EntityManagerInterface $manager
    ): Response
    {
        $form = $this->createForm(BilletageType::class, $billetage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->flush();
            $this->addFlash('success', 'Inventaire modifié avec succes');
            return $this->redirectToRoute('billetage_inventaire_show', ['uuid' => $billetage->getUuid()]);
        }

        return $this->render('billetage/edit.html.twig', [
            'billetage' => $billetage,
            'form' => $form->createView(),
            'editing' => true
        ]);
    }

    #[Route('/{uuid}/show', name: 'show', methods: ['POST', 'GET'])]
    public function show(
        Billetage              $billetage,
        Request                $request,
        EntityManagerInterface $manager,
        JourneeRepository  $journeeRepository
    ): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        if ($request->isMethod('POST') &&
            $this->isCsrfTokenValid('validate-caisse-billetage', $request->request->get('_token'))) {
            if ($request->request->has('confirm')) {
                $currentDate = new \DateTimeImmutable();
                $currentDate->format('D, d M Y H:i:s');
                $billetage
                    ->setStatus(Status::VALIDATED)
                    ->setConfirmedAt(new \DateTimeImmutable())
                    ->setConfirmedBy($user);
                $manager->flush();
                $this->addFlash('success', 'Iventaire validé avec succès');
                return $this->redirectToRoute('bonapprovisionnement_index');
            }
        }

        return $this->render('billetage/show.html.twig', [
            'billetage' => $billetage,
        ]);
    }
}
