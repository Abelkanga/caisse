<?php

namespace App\Form;

use App\Entity\Detail;
use App\Entity\Fdb;
use App\Entity\Operation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('designationproduit')
            ->add('quantite')
            ->add('price')
            ->add('montant')
            ->add('operation', EntityType::class, [
                'class' => Operation::class,
                'choice_label' => 'id',
            ])
            ->add('fdb', EntityType::class, [
                'class' => Fdb::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Detail::class,
        ]);
    }
}
