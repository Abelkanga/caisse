<?php

namespace App\Form;

use App\Entity\Caisse;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class)
            ->add('pseudo', TextType::class)
            ->add('contact', TextType::class)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('caisse', EntityType::class,[
                'class' => Caisse::class,
                'placeholder' => 'Sélectionnez une caisse', 'required'=> false

            ])
            ->add('isActive', CheckboxType::class, [
                'attr' => [
                    'class' => 'form-check-input',
                ],
                'required' => false,
                'label' => 'Actif ',
                'label_attr' => [
                    'class' => 'form-check-label'
                ],
                'data' => true
                    ])

            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                    'Caissier' => 'ROLE_MANAGER',
                    'Responsable' => 'ROLE_USER'
                ],
                'multiple' => true,
                'expanded' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
