<?php

namespace App\Form;

use App\Entity\Bda;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BdaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_approvisionnement', DateType::class)
            ->add('mode_paiement', ChoiceType::class, [
                'choices'  => [
                    'Espèce' => 'espece',
                    'Carte' => 'carte',
                    'Chèque' => 'cheque',
                ],
            ])
            ->add('numero_cheque', TextType::class)
            ->add('montant_total_approvisionnement', NumberType::class)
            ->add('nature_approvisionnement', TextType::class)
            ->add('produits_services', TextType::class)

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
            'data_class' => Bda::class,
        ]);
    }
}
