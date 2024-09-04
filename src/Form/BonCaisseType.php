<?php

namespace App\Form;

use App\Entity\Expense;
use App\Entity\TypeExpense;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\BonCaisse;
use App\Entity\Fdb;

class BonCaisseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Champ du Bon de Caisse
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date d\'établissement',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('reference', TextType::class, [
                'label' => 'Référence',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('beneficiaire', TextType::class, [
                'label' => 'Bénéficiaire',
                'required' => true,
                'attr' => ['class' => 'form-control'],
            ]);

//        // Champs de la Fiche de Besoin (grisés)
//        $builder
//            ->add('fdbNumeroFicheBesoin', TextType::class, [
//                'mapped' => false,
//                'data' => $options['fdb']->getNumeroFicheBesoin(),
//                'label' => 'N° Fiche de besoin',
//                'attr' => ['class' => 'form-control', 'readonly' => true], // Grisé
//            ])
//            ->add('fdbTypeExpense', EntityType::class, [
//                'class' => TypeExpense::class,
//                'mapped' => false,
//                'data' => $options['fdb']->getTypeExpense(),
//                'label' => 'Type d\'opération',
//                'attr' => ['class' => 'form-control select2', 'readonly' => true], // Grisé
//            ])
//            ->add('fdbExpense', EntityType::class, [
//                'class' => Expense::class,
//                'mapped' => false,
//                'data' => $options['fdb']->getExpense(),
//                'label' => 'Nature d\'opération',
//                'attr' => ['class' => 'form-control select2', 'readonly' => true], // Grisé
//            ])
//            ->add('fdbTotal', MoneyType::class, [
//                'mapped' => false,
//                'data' => $options['fdb']->getTotal(),
//                'label' => 'Montant total',
//                'attr' => ['class' => 'form-control', 'readonly' => true], // Grisé
//            ]);

    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BonCaisse::class,
            'fdb' => null,
            'detail' => null,// On passera la Fdb en option
        ]);

        $resolver->setRequired('fdb');
        $resolver->setAllowedTypes('fdb', ['App\Entity\Fdb']);
    }
}
