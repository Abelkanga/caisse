<?php

namespace App\Form;

use App\Entity\Fdb;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FdbType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero_fiche_besoin', TextType::class)
            ->add('date', DateType::class)
            ->add('objet', TextType::class)
            ->add('responsable', ChoiceType::class, [
                'choices'  => [
                    'Otron André' => 'Otron André',
                    'Konan Bertrand' => 'Konan Bertrand',
                    'Wognin' => 'Wognin',
                ]
            ])
            ->add('destinataire', TextType::class, [
              'attr' => [
                  'readonly' => true
              ]
            ])
            ->add('departement', TextType::class)
            ->add('details', CollectionType::class,  [
                'entry_type' => DetailType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
            ]);


            //->add('submit', SubmitType::class, [
               // 'attr' => [
                //    'class' => 'btn btn-primary mt-4'
             //   ]
          //  ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fdb::class,
        ]);
    }
}

