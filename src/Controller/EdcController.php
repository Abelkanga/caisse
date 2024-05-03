<?php

namespace App\Controller;

use App\Entity\Edc;
use App\Entity\EtatDeCaisse;
use App\Form\EdcType;
use App\Form\EtatDeCaisseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/edc")
 */
class EdcController extends AbstractController
{
    /**
     * @Route("/", name="edc_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $edcs = $entityManager->getRepository(Edc::class)->findAll();

        return $this->render('edc/index.html.twig', [
            'edcs' => $edcs,
        ]);
    }

    /**
     * @Route("/new", name="edc_new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $edc = new Edc();
        $form = $this->createForm(EdcType::class, $edc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($edc);
            $entityManager->flush();

            return $this->redirectToRoute('edc_index');
        }

    }

}