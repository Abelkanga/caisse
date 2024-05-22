<?php

namespace App\Form;

use App\Entity\Depense;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class)
            ->add('montant')
            ->add('category')
            ->add('modepaie', ChoiceType::class, [
                'label' => 'Mode de paiement',
                'choices'  => [
                    'Espèce' => 'Espèce',
                    'Carte' => 'Carte',
                    'Chèque' => 'Chèque',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Depense::class,
        ]);
    }
}
