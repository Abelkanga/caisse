<?php

namespace App\Form;

use App\Entity\Caisse;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('caisse', EntityType::class,[
                'class' => Caisse::class,
                'placeholder' => 'Sélectionner une caisse', 'required'=> false

            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                    'Gérant de caisse' => 'ROLE_MANAGER',
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
