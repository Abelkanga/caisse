<?php

namespace App\Form;

use App\Entity\Caisse;
use App\Entity\Emeteur;
use App\Entity\Expense;
use App\Entity\Fdb;
use App\Entity\Journee;
use App\Entity\OrderMission;
use App\Entity\TypeExpense;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderMissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'class' => 'js-datepicker form-control',
                ],
                'required' => false,

            ])
            ->add('reference')

            ->add('gerant')
            ->add('orderTo')
            ->add('getTo', TextType::class, [
                'required' => true,
            ])
            ->add('fullName', TextType::class, [
                'required' => true,
            ])
            ->add('dateDepart', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'class' => 'js-datepicker form-control',
                ],
                'required' => true,

            ])
            ->add('dateRetour', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'class' => 'js-datepicker form-control',
                ],
                'required' => true,

            ])
            ->add('fonction')
            ->add('service')
            ->add('detailMission', CollectionType::class, [
                'entry_type' => DetailMissionType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
            ])
//            ->add('status')
//            ->add('beneficiaire')
//            ->add('montant')
//
//
//            ->add('isActive')
//            ->add('fdb', EntityType::class, [
//                'class' => Fdb::class,
//                'choice_label' => 'id',
//            ])
//            ->add('caisse', EntityType::class, [
//                'class' => Caisse::class,
//                'choice_label' => 'id',
//            ])
//            ->add('user', EntityType::class, [
//                'class' => User::class,
//                'choice_label' => 'id',
//            ])
//            ->add('typeExpense', EntityType::class, [
//                'class' => TypeExpense::class,
//                'choice_label' => 'name',
//            ])
//            ->add('expense', EntityType::class, [
//                'class' => Expense::class,
//                'choice_label' => 'name',
//            ])

//            ->add('emeteur', EntityType::class, [
//                'class' => Emeteur::class,
//                'choice_label' => 'id',
//            ])
//            ->add('journee', EntityType::class, [
//                'class' => Journee::class,
//                'choice_label' => 'id',
//            ])
//            ->add('validBy', EntityType::class, [
//                'class' => User::class,
//                'choice_label' => 'id',
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OrderMission::class,
        ]);
    }
}
