<?php

namespace App\Form;

use App\Entity\Caisse;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CaisseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class)
            ->add('intitule', TextType::class)
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'fullName',  // Assurez-vous que 'fullName' est un attribut ou une méthode existante dans User
                'placeholder' => 'Sélectionnez un utilisateur',
                'required' => false,
                'multiple' => false,  // Changement ici : l'utilisateur doit être unique
                'expanded' => false,  // Gardez ce champ sous forme de dropdown (select)
            ])
            ->add('plafond', NumberType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Caisse::class,
        ]);
    }
}
