<?php

namespace App\Form;

use App\Entity\ApproCaisse;
use App\Entity\Caisse;
use App\Repository\CaisseRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ApproCaisseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date d\'établissement',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('montant', NumberType::class)
            ->add('objet', TextType::class)
            ->add('reference', TextType::class)
            ->add('caisse', EntityType::class, [
                'class' => Caisse::class,
                'placeholder' => 'Sélectionnez une caisse',
                'required' => false,
                'query_builder' => function (CaisseRepository $caisseRepository) {
                    // Filtrer les caisses dont l'ID est supérieur à 1
                    return $caisseRepository->createQueryBuilder('c')
                        ->where('c.id > 1');
                },
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ApproCaisse::class,
        ]);
    }
}
