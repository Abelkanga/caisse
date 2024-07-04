<?php

namespace App\Controller;

use App\Entity\Billetage;
use App\Form\BilletageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BilletageController extends AbstractController
{
    #[Route('/billetage', name: 'billetage_form')]
    public function showForm(Request $request, EntityManagerInterface $entityManager): Response
    {
        $billetage = new Billetage();
        $form = $this->createForm(BilletageType::class, $billetage);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $totalAmount = $this->calculateTotalAmount($billetage);
            $billetage->setBalance($totalAmount);
            $entityManager->persist($billetage);
            $entityManager->flush();

            return $this->redirectToRoute('billetage_result', ['id' => $billetage->getId()]);
        }

        return $this->render('billetage/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/billetage/result/{id}', name: 'billetage_result')]
    public function showResult(Billetage $billetage): Response
    {
        $totalAmount = $this->calculateTotalAmount($billetage);

        return $this->render('billetage/index.html.twig', [
            'billetage' => $billetage,
            'totalAmount' => $totalAmount,
        ]);
    }


    private function calculateTotalAmount(Billetage $billetage): int
    {
        return ($billetage->getB10000() * 10000) +
            ($billetage->getB5000() * 5000) +
            ($billetage->getB2000() * 2000) +
            ($billetage->getB1000() * 1000) +
            ($billetage->getB500() * 500) +
            ($billetage->getM500() * 500) +
            ($billetage->getM250() * 250) +
            ($billetage->getM200() * 200) +
            ($billetage->getM100() * 100) +
            ($billetage->getM50() * 50) +
            ($billetage->getM10() * 10) +
            ($billetage->getM5() * 5);
    }
}
