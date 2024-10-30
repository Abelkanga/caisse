<?php

namespace App\Form;

use App\Entity\ApproCaisse;
use App\Entity\Caisse;
use App\Entity\User;
use App\Repository\CaisseRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ApproCaisseType extends AbstractType
{

    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        // Obtenir l'utilisateur connecté
        /** @var User $user */
        $user = $this->security->getUser();

        // Obtenir la caisse de l'utilisateur connecté
        $caissePrincipale = $user->getCaisse();

        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date d\'établissement',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('montant', NumberType::class)
            ->add('objet', TextType::class)
            ->add('reference', TextType::class)

            // Caisse émettrice : Afficher uniquement la caisse principale
            ->add('caisseEmettrice', EntityType::class, [
                'class' => Caisse::class,
                'choice_label' => 'intitule',
                'query_builder' => function (EntityRepository $er) use ($caissePrincipale) {
                    return $er->createQueryBuilder('c')
                        ->where('c = :caissePrincipale')
                        ->setParameter('caissePrincipale', $caissePrincipale);
                },
                'data' => $caissePrincipale,  // Prérempli avec la caisse de l'utilisateur connecté
                'placeholder' => false,
            ])

            // Caisse réceptrice : Afficher toutes les autres caisses sauf la principale
            ->add('caisseReceptrice', EntityType::class, [
                'class' => Caisse::class,
                'choice_label' => 'intitule',
                'query_builder' => function (EntityRepository $er) use ($caissePrincipale) {
                    return $er->createQueryBuilder('c')
                        ->where('c != :caissePrincipale')
                        ->setParameter('caissePrincipale', $caissePrincipale);
                },
                'placeholder' => 'Sélectionnez la caisse réceptrice',
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ApproCaisse::class,
        ]);
    }
}
