<?php

namespace App\Form;

use App\Entity\UpdatePassword;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdatePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('password', PasswordType::class,[
            ])
            ->add('newPassword', PasswordType::class,[
            ])
            ->add('confirmPassword', PasswordType::class,[
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UpdatePassword::class
        ]);
    }
}
