<?php

// src/Validator/MontantSortieValideValidator.php
namespace App\Validator;

use App\Entity\BonCaisse;
use App\Entity\BonMission;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Form\FormInterface;
use Doctrine\ORM\EntityManagerInterface;

class MontantSortieValideValidator extends ConstraintValidator
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function validate($value, Constraint $constraint)
    {
        /** @var FormInterface $form */
        $form = $this->context->getRoot();
        $typeDepense = $form->get('typeDepense')->getData();
        $referenceDepense = $form->get('referenceDepense')->getData();

        // Récupérer le montant décaissé de la dépense
        $montantDecaisse = null;
        if ($typeDepense === 'bon_mission') {
            $bonMission = $this->entityManager->getRepository(BonMission::class)->findOneBy(['reference' => $referenceDepense]);
            if ($bonMission) {
                $montantDecaisse = $bonMission->getTotal();
            }
        } elseif ($typeDepense === 'bon_caisse') {
            $bonCaisse = $this->entityManager->getRepository(BonCaisse::class)->findOneBy(['reference' => $referenceDepense]);
            if ($bonCaisse) {
                $montantDecaisse = $bonCaisse->getMontant();
            }
        }

        // Vérifier que le montant saisi correspond au montant décaissé
        if ($montantDecaisse !== null && $value != $montantDecaisse) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ montantDecaisse }}', $montantDecaisse)
                ->atPath('montant')
                ->addViolation();
        }
    }
}