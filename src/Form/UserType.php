<?php

namespace App\Form;

use App\Entity\Caisse;
use App\Entity\Emeteur;
use App\Entity\Fonction;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\SecurityBundle\Security;
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
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class)
            ->add('pseudo', TextType::class)
            ->add('contact', TextType::class)
            ->add('fonction', EntityType::class, [
                'class' => Fonction::class,
                'choice_label' => 'name',
                'placeholder' => 'Sélectionnez une fonction', 'required' => false,
                'choice_value' => 'id',
            ])
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class);


        if ($this->security->isGranted('ROLE_ADMIN')) {
            $builder

                ->add('roles', ChoiceType::class, [
                    'choices' => [
                        'Administrateur' => 'ROLE_ADMIN',
                        'Approbation' => 'ROLE_MANAGER',
                        'Validation' => 'ROLE_RESPONSABLE',
                        'Saisie' => 'ROLE_USER',
                        'Impression' => 'ROLE_IMPRESSION'
                    ],
                    'multiple' => true,
                    'expanded' => false,
                ]);


        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
