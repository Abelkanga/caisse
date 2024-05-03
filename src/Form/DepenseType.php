<?php

namespace App\Form;

use App\Entity\Depense;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DepenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_depense', DateType::class)
            ->add('montant_depense', NumberType::class)
            ->add('categorie_depense', ChoiceType::class, [
                'choices'  => [
                    'Frais de mission' => 'frais_mission',
                    'Fournitures' => 'fournitures',
                ],
            ])
            ->add('mode_paiement', ChoiceType::class, [
                'choices'  => [
                    'Espèce' => 'espece',
                    'Carte' => 'carte',
                    'Chèque' => 'cheque',
                ],
            ])
            ->add('fiche_besoin', TextType::class)

            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-4' 
                ]
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Depense::class,
        ]);
    }
}
