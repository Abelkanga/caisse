<?php

namespace App\Form;

use App\Entity\Fonction;
use App\Entity\Societe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class)
            ->add('RaisonSociale', TextType::class)
            ->add('Fonction', EntityType::class, [
                'class' => Fonction::class,
                'placeholder' => 'Sélectionnez une forme juridique',
                'required' => false,
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('Activite', TextType::class)
            ->add('siegeSocial', TextType::class)
            ->add('AdressePostale', TextType::class)
            ->add('Ville', TextType::class)
            ->add('Pays', TextType::class)
            ->add('Telephone', TextType::class)
            ->add('Email', EmailType::class)
            ->add('SiteInternet', TextType::class)
            ->add('CodeCommerce', TextType::class)
            ->add('NumeroCompteContribuable', TextType::class)
            ->add('RegimeFiscale', TextType::class)
            ->add('NumeroTeleDeclarant', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }
}
