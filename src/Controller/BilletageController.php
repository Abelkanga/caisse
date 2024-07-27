<?php

namespace App\Controller;

use App\Entity\Billetage;
use App\Entity\Caisse;
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
//        $activeJournee = $journeeRepository->activeJournee();
//        if (!$activeJournee) {
////            $this->addFlash('error', 'Vous devez ouvrir la caisse avant de créer un bon d\'approvisionnement.');
//
//            flash()
//                ->options([
//                    'timeout' => 5000, // 3 seconds
//                    'position' => 'bottom-right',
//                ])
//                ->error('Aucune journée active. Veuillez ouvrir la caisse avant de créer un billetage.');
//
//
//            return $this->redirectToRoute('app_comptability_caisse_journee_open');
//        }

        /** @var User $user */
        $user = $this->getUser();
        $caisse = $user->getCaisse();

        $billetage = (new Billetage())
            ->setBalance($caisse->getSoldedispo());

        $form = $this->createForm(BilletageType::class, $billetage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $billetage
                ->setStatus(Status::EN_ATTENTE)
                ->setUser($user)
                ->setCaisse($caisse);

            $manager->persist($billetage);
            $manager->flush();

//            $this->addFlash('success', 'Inventaire enregistré avec succes');

            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Inventaire enregistré avec succes ');



            return $this->redirectToRoute('billetage_inventaire_show', ['uuid' => $billetage->getUuid()]);
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


            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Inventaire modifié avec succes');

//            $this->addFlash('success', 'Inventaire modifié avec succes');

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
        $caisse = $user->getCaisse();

        $activeJournee = $journeeRepository->activeJournee($caisse);
        if($activeJournee) {
            $this->addFlash('error', 'Veuillez fermer la journee en cours svp');
            return $this->redirectToRoute('bonapprovisionnement_index');
        }

        if ($request->isMethod('POST') &&
            $this->isCsrfTokenValid('validate-caisse-billetage', $request->request->get('_token'))) {
            if ($request->request->has('confirm')) {
                $currentDate = new \DateTimeImmutable();
                $currentDate->format('D, d M Y H:i:s');
                $billetage
                    ->setStatus(Status::VALIDATED);
//                    ->setConfirmedAt(new \DateTimeImmutable())
//                    ->setConfirmedBy($user);

                $caisse->setSoldedispo($billetage->getAmount());

                $manager->flush();

//                $this->addFlash('success', 'Inventaire validé avec succès');

                flash()
                    ->options([
                        'timeout' => 5000, // 3 seconds
                        'position' => 'bottom-right',
                    ])
                    ->success('Inventaire validé avec succes');



                return $this->redirectToRoute('app_welcome');
            }
        }

        return $this->render('billetage/show.html.twig', [
            'billetage' => $billetage,
        ]);
    }




    private function closeJournee(Journee $journee, Caisse $caisse, EntityManagerInterface $manager): void
    {
        $journee->setActive(false);
        $caisse->setSoldedispo($journee->getSolde());

        $manager->persist($journee);
        $manager->persist($caisse);
        $manager->flush();
    }

}
