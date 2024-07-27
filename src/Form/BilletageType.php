<?php

namespace App\Form;

use App\Entity\Billetage;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class BilletageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class)
            ->add("reference")
            ->add('b10000', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'data-id' => 10000,
                    'class' => 'text-right montant separator billet form-control form-control-sm',
                    'tabindex' => 1
                ]
            ])
            ->add('b5000', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'data-id' => 5000,
                    'class' => 'text-right montant separator billet form-control form-control-sm',
                    'tabindex' => 2
                ]
            ])
            ->add('b2000', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'data-id' => 2000,
                    'class' => 'text-right montant separator billet form-control form-control-sm',
                    'tabindex' => 3
                ]
            ])
            ->add('b1000', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'data-id' => 1000,
                    'class' => 'text-right montant separator billet form-control form-control-sm',
                    'tabindex' => 4
                ]
            ])
            ->add('b500', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'data-id' => 500,
                    'class' => 'text-right montant separator billet form-control form-control-sm',
                    'tabindex' => 5
                ]
            ])
            ->add('m500', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'data-id' => 500,
                    'class' => 'text-right montant separator monnaie form-control form-control-sm',
                    'tabindex' => 6
                ]
            ])
            ->add('m250', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'data-id' => 250,
                    'class' => 'text-right montant separator monnaie form-control form-control-sm',
                    'tabindex' => 7
                ]
            ])
            ->add('m200', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'data-id' => 200,
                    'class' => 'text-right montant separator monnaie form-control form-control-sm',
                    'tabindex' => 8
                ]
            ])
            ->add('m100', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'data-id' => 100,
                    'class' => 'text-right montant separator monnaie form-control form-control-sm',
                    'tabindex' => 9
                ]
            ])
            ->add('m50', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'data-id' => 50,
                    'class' => 'text-right montant separator monnaie form-control form-control-sm',
                    'tabindex' => 10
                ]
            ])
            ->add('m10', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'data-id' => 10,
                    'class' => 'text-right montant separator monnaie form-control form-control-sm',
                    'tabindex' => 11
                ]
            ])
            ->add('m5', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'data-id' => 5,
                    'class' => 'text-right montant separator monnaie form-control form-control-sm',
                    'tabindex' => 12
                ]
            ])


            ->add('balance', TextType::class, [
                'attr' => ['id' => 'billetage_balance']
            ])
            ->add('amount', TextType::class, [
                'attr' => ['id' => 'billetage_amount']
            ])
            ->add('ecart', TextType::class, [
                'attr' => ['id' => 'billetage_ecart']
            ]);


    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Billetage::class,
        ]);
    }
}
