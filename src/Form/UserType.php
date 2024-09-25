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
            ->add('pseudo', TextType::class, [
                'attr' => [
                    'readonly' => true,  // Rendre le champ non modifiable
                    'class' => 'form-control'
                ]
            ])
            ->add('contact', TextType::class)
            ->add('fonction', TextType::class)
            ->add('email', EmailType::class);

        // Vérifiez si l'utilisateur actuel est en train de modifier son propre profil
        if ($this->security->isGranted('ROLE_ADMIN') && !$options['is_editing_self']) {
            $builder->add('roles', ChoiceType::class, [
                'choices' => [
                    'Créer/Convertir Reçu de caisse et Bon de caisse' => 'ROLE_MANAGER',
                    'Approuver Fiche de besoin' => 'ROLE_MANAGER1',
                    'Valider Fiche de besoin' => 'ROLE_RESPONSABLE',
                    'Créer/Modifier Fiche de besoin' => 'ROLE_USER',
                    'Imprimer Document' => 'ROLE_IMPRESSION',
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
            'is_editing_self' => false,  // Ajoutez une option pour indiquer si l'utilisateur édite son propre profil
        ]);
    }
}