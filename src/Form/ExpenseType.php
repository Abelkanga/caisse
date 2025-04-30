<?php

namespace App\Form;

use App\Entity\Expense;
use App\Entity\TypeExpense;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExpenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code', TextType::class, [
                'label' => 'N° de compte'
            ])
            ->add('name', TextType::class, [
                'label' => 'Intitulé'
            ])
            ->add('autre')
            ->add('typeExpense', EntityType::class, [
                'class' => TypeExpense::class,
                'choice_label' => function (TypeExpense $typeExpense) {
                    return sprintf('%s  %s', $typeExpense->getCode(), $typeExpense->getName());
                },
                'attr' => [
                    'class' => 'select2 '
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Expense::class,
        ]);
    }
}
