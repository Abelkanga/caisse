<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\RecuCaisse;
use App\Entity\Bonapprovisionnement;

class RecuCaisseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('reference', TextType::class, [
                'label' => 'Référence',
                'attr' => ['class' => 'form-control'],
            ]);
//            ->add('beneficiaire', TextType::class, [
//                'label' => 'Bénéficiaire',
//                'required' => true,
//                'attr' => ['class' => 'form-control'],
//            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RecuCaisse::class,
            'bonapprovisionnement' => null,

        ]);

        $resolver->setRequired('bonapprovisionnement');
        $resolver->setAllowedTypes('bonapprovisionnement', ['App\Entity\Bonapprovisionnement']);
    }
}
