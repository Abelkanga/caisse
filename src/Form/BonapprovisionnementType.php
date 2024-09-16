<?php

namespace App\Form;

use App\Entity\Bonapprovisionnement;
use App\Entity\Emeteur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BonapprovisionnementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class)
            ->add('reference', TextType::class)
            ->add('destinataire', TextType::class)
            ->add('porteur', TextType::class)
            ->add('modepaie', ChoiceType::class, [
                'choices'  => [
                    'Banque' => 'Banque',
//                    'Caisse' => 'Caisse',
                    'Prêt' => 'Prêt',
                ],
                'placeholder' => 'Sélectionnez un moyen d\'approvisionnement',
            ])

            ->add('montanttotal', NumberType::class)
            ->add('nomTiers', TextType::class);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bonapprovisionnement::class,
        ]);
    }
}