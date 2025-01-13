<?php

namespace App\Form;

use App\Entity\Detail;
use App\Entity\DetailBonMission;
use App\Entity\DetailMission;
use App\Entity\Produit;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailBonMissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rubrique', EntityType::class, [
                'class' => Produit::class,
                'placeholder' => 'Sélectionnez une rubrique',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('te')
                        ->orderBy('te.libelle', 'ASC'); // Tri par ordre croissant
                },
            ])
//            ->add('rubrique', EntityType::class, [
//                'class' => Produit::class,
//                'placeholder' => 'Sélectionnez une rubrique',
//                'query_builder' => function (EntityRepository $er) {
//                    return $er->createQueryBuilder('te')
//                        ->orderBy('te.libelle', 'ASC'); // Tri par ordre croissant
//                },
//                'choice_label' => function (Produit $produit) {
//                    return sprintf('%s (%s)', $produit->getLibelle(), $produit->getTypeProduit());
//                },
//                'attr' => ['class' => 'form-control'], // Ajoutez des classes CSS si nécessaire
//            ])
            ->add('quantite')
            ->add('price',TextType::class)
            ->add('montant',TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DetailBonMission::class,
        ]);
    }
}
