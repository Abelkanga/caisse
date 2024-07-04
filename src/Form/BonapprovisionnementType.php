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
            ->add('emeteur', EntityType::class, [
                'class' => Emeteur::class,
                'placeholder' => 'Sélectionnez un émetteur', 'required' => false
            ])
            ->add('porteur', TextType::class)
            ->add('modepaie', TextType::class, [
                'attr' => [
                    'readonly' => false
                ]
            ])
            ->add('montanttotal', NumberType::class);



    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bonapprovisionnement::class,
        ]);
    }
}
