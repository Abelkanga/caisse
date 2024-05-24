<?php

namespace App\Form;

use App\Entity\Depense;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class)
            ->add('montant')
            ->add('category')
            ->add('modepaie', ChoiceType::class, [
                'label' => 'Mode de paiement',
                'choices'  => [
                    'Espèce' => 'Espèce',
                    'Carte' => 'Carte',
                    'Chèque' => 'Chèque',
                ],
            ])
        ;

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            /** @var Depense $depense */
            $depense = $event->getData();
            $total = 0;
//            foreach ($depense->getDetails() as $d) {
//                $total += $d->getMontant();
//            }
            $depense->setTotal($total);
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Depense::class,
        ]);
    }
}
