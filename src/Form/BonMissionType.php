<?php

namespace App\Form;

use App\Entity\BonMission;
use App\Entity\Expense;
use App\Entity\TypeExpense;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\BonCaisse;
use App\Entity\Fdb;

class BonMissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Champ du Bon de Caisse
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('reference', TextType::class, [
                'label' => 'Référence',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('beneficiaire', TextType::class, [
                'label' => 'Bénéficiaire',
                'required' => true,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('detailBonMission', CollectionType::class, [
                'entry_type' => DetailBonMissionType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
            ])

//            ->add('montant', TextType::class, [
//                'label' => 'Montant',
//                'required' => true,
//                'attr' => ['class' => 'form-control'],
//            ])
        ;


        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            /** @var BonMission $bonMission */
            $bonMission = $event->getData();
            $total = 0;
            foreach ($bonMission->getDetailBonMission() as $d) {
                $total += $d->getMontant();
            }
            $bonMission->setTotal($total);
        }

        );


//        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvents $event) {
//            /** @var BonMission $bonMission */
//            $bonMission = $event->getData();
//            $form = $event->getForm();
//        }
//        );

    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BonMission::class,
            'orderMission' => null,
            'detailMission' => null,// On passera la Fdb en option
        ]);

        $resolver->setRequired('orderMission');
        $resolver->setAllowedTypes('orderMission', ['App\Entity\OrderMission']);
    }
}
