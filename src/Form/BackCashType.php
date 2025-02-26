<?php

namespace App\Form;

use App\Entity\BackCash;
use App\Validator\MontantSortieValide;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BackCashType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('reference', TextType::class, [
                'label' => 'Référence',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('typeDepense', ChoiceType::class, [
                'choices'  => [
                    'Bon de caisse' => 'bon_caisse',
                    'Bon de mission' => 'bon_mission',
                ],
                'placeholder' => 'Sélectionnez un type',
                'attr' => ['class' => 'form-control', 'id' => 'type-depense'],
            ])
            ->add('referenceDepense', TextType::class, [
                'label' => 'Référence de la dépense',
                'attr' => ['class' => 'form-control', 'id' => 'reference-depense'],
                'required' => false, // Permet de saisir manuellement
            ])
            ->add('montant', NumberType::class, [
                'label' => 'Montant',
                'attr' => ['class' => 'form-control', 'id' => 'montant', 'readonly' => false],
                'constraints' => [
                    new MontantSortieValide(),
                ],
            ])
            ->add('montantRetour', NumberType::class, [
                'label' => 'Montant à retourner',
                'attr' => ['class' => 'form-control'],
            ]);


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BackCash::class,
        ]);
    }

}