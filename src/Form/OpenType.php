<?php

namespace App\Form;

use App\Entity\Journee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startedAt', DateTimeType::class, [
                'attr' => [
                    'class' => 'form-control form-control-sm'
                ],
                'html5' => true,
                'widget' => 'single_text',
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Journee::class,
        ]);
    }
}
