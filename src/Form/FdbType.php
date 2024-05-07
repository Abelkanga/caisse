<?php

namespace App\Form;

use App\Entity\Fdb;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FdbType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero_fiche_besoin', TextType::class)
            ->add('date', DateType::class)
            ->add('objet', TextType::class)
            ->add('responsable', TextType::class)
            ->add('destinataire', TextType::class)
            ->add('departement', TextType::class)
            ->add('signature', TextType::class)
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
            'data_class' => Fdb::class,
        ]);
    }
}

