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
            ->add('modepaie', ChoiceType::class, [
                'choices'  => [
                    'Banque' => 'banque',
                    'Caisse' => 'caisse',
                    'Prêt' => 'pret',
                ],
                'placeholder' => 'Sélectionnez un moyen d\'approvisionnement',
            ])

            ->add('montanttotal', NumberType::class)

            // Champs pour les détails bancaires
            ->add('NomBanque', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'd-none'] // Masqué par défaut
            ])
            ->add('CheckNumber', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'd-none'] // Masqué par défaut
            ])

            // Champs pour les détails de caisse
            ->add('NomCaisse', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'd-none'] // Masqué par défaut
            ])
            ->add('NumeroBon', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'd-none'] // Masqué par défaut
            ])

            // Champs pour les détails de prêt
            ->add('NomTiers', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'd-none'] // Masqué par défaut
            ])
            ->add('Echeance', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
                'attr' => ['class' => 'd-none'] // Masqué par défaut
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bonapprovisionnement::class,
        ]);
    }
}