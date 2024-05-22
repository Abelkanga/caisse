<?php

namespace App\Form;

use App\Entity\Bonapprovisionnement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BonapprovisionnementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class)
            ->add('modepaie', ChoiceType::class, [
                'label' => 'Mode de paiement',
                'choices'  => [
                    'Espèce' => 'Espèce',
                    'Carte' => 'Carte',
                    'Chèque' => 'Chèque',
                ],
            ])
            ->add('montanttotal', NumberType::class)
            ->add('nature')
            ->add('details', CollectionType::class,  [
                'entry_type' => DetailType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
            ]);


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bonapprovisionnement::class,
        ]);
    }
}
