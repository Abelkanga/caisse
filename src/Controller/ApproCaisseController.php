<?php

namespace App\Controller;

use App\Entity\ApproCaisse;
use App\Entity\User;
use App\Form\ApproCaisseType;
use App\Repository\ApproCaisseRepository;
use App\Repository\CaisseRepository;
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
    public function new(Request $request, EntityManagerInterface $manager, CaisseService $service): Response
    {
        $num_approCaisse = $service->refApproCaisse();

        $approCaisse = (new ApproCaisse())->setDate(new \DateTime())->setReference($num_approCaisse)->setObjet('Approvisionnement de caisse à caisse');

        $form = $this->createForm(ApproCaisseType::class, $approCaisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();

            $approCaisse
                ->setUser($user)
                ->setStatus(Status::EN_ATTENTE);


            $manager->persist($approCaisse);
            $manager->flush();

            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->success('Approvisionnement caisse créée avec succès !');

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

    // src/Controller/ApproCaisseController.php

    #[Route('/{id}/decaisser', name: 'app_approcaisse_decaisser', methods: ['POST'])]
    public function decaisser(ApproCaisse $approCaisse, EntityManagerInterface $manager, CaisseRepository $caisseRepository): Response
    {
        // Récupérer la caisse principale (celle qui envoie de l'argent)
        $caissePrincipale = $caisseRepository->findOneBy(['code' => 'C001']); // Ici, le code de la caisse principale doit être spécifié
        // Récupérer la caisse secondaire (celle qui reçoit l'argent)
        $caisseSecondaire = $caisseRepository->find($approCaisse->getCaisse()->getId());

        // Le montant à transférer
        $montant = (float)$approCaisse->getMontant();

        // Vérifier si la caisse principale a suffisamment de solde
        if ((float)$caissePrincipale->getSoldedispo() < $montant) {
            $this->addFlash('danger', 'Solde insuffisant dans la caisse principale.');
            return $this->redirectToRoute('app_approcaisse_show', ['id' => $approCaisse->getId()]);
        }

        // Mise à jour des soldes
        $nouveauSoldePrincipale = (float)$caissePrincipale->getSoldedispo() - $montant;
        $nouveauSoldeSecondaire = (float)$caisseSecondaire->getSoldedispo() + $montant;

        $caissePrincipale->setSoldedispo($nouveauSoldePrincipale);
        $caisseSecondaire->setSoldedispo($nouveauSoldeSecondaire);

        // Changer le statut de l'approvisionnement à "COMPLETED"
        $approCaisse->setStatus('CONVERT');

        // Persister les modifications
        $manager->persist($caissePrincipale);
        $manager->persist($caisseSecondaire);
        $manager->persist($approCaisse);
        $manager->flush();


        // Message de succès
        $this->addFlash('success', 'Le transfert a été effectué avec succès.');

        return $this->redirectToRoute('app_approcaisse_show', ['id' => $approCaisse->getId()]);
    }


}
