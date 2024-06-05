<?php

namespace App\Form;

use App\Entity\Depense;

use App\Entity\Expense;
use App\Entity\TypeExpense;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class DepenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class)
            ->add('montant', )
            ->add('category')
            ->add('modepaie', ChoiceType::class, [
                'label' => 'Mode de paiement',
                'choices'  => [
                    'Espèce' => 'Espèce',
                    'Carte' => 'Carte',
                    'Chèque' => 'Chèque',
                ],
//                'required' => true,'empty_data' => ''
            ])

//


        ;

//        $formUpdate = static function (FormInterface $form, ?TypeExpense $typeExpense) {
//            $form->add("expense", EntityType::class, [
//                "class" => Expense::class,
//                "choice_label" => "name",
//                "placeholder" => "",
//                "query_builder" => function (EntityRepository $er) use ($typeExpense) {
//                    return $er
//                        ->createQueryBuilder('e')
//                        ->where("e.typeExpense = :type")
//                        ->setParameter("type", $typeExpense);
//                },
//            ]);
//        };
//
//        $builder->addEventListener(FormEvents::PRE_SET_DATA,
//            function (FormEvent $event) use ($formUpdate) {
//                /** @var Depense $data */
//                $data = $event->getData();
//                $formUpdate($event->getForm(), $data?->getTypeExpense());
//            });
//
//
//        $builder->get('typeExpense')->addEventListener(FormEvents::POST_SUBMIT,
//            function (FormEvent $event) use ($formUpdate) {
//                $typeExpense = $event->getForm()->getData();
//                $form = $event->getForm()->getParent();
//                $formUpdate($form, $typeExpense);
//            });

//
//        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
//            /** @var Depense $depense */
//            $depense = $event->getData();
//            $montant = 0;
//
//            $depense->setMontant($montant);
//        });
   }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Depense::class,
        ]);
    }

}
