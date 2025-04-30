<?php

namespace App\Form;

use App\Entity\Fdb;
use App\Entity\User;
use App\Entity\Expense;
use App\Form\DetailType;
use App\Entity\TypeExpense;
use Doctrine\ORM\Query\Parameter;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;
use App\Repository\ExpenseRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class FdbType extends AbstractType
{
    public function __construct(
        private readonly Security       $security,
        private readonly UserRepository $userRepository
    ) {}

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'class' => 'js-datepicker form-control',
                ],
                'required' => false,

            ])
            ->add('numero_fiche_besoin', TextType::class, [
                'required' => true,
                'empty_data' => ''
            ])
            ->add('validBy', EntityType::class, [
                'class' => User::class,
                'choice_label' => function (User $user) {
                    return $user->getFullName() . ' ' . $user->getPrenom();
                },
                'query_builder' => function (UserRepository $userRepository) {
                    /** @var User $user */
                    $user = $this->security->getUser();

                    return $userRepository->createQueryBuilder('u')
                        ->where('u.id = :p_user')
                        ->setParameter('p_user', $user->getId());
                },
            ])

            ->add('beneficiaire', TextType::class)
            ->add('typeExpense', EntityType::class, [
                'class' => TypeExpense::class,
                'placeholder' => 'Sélectionnez un type de dépense',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('te')
                        ->orderBy('te.name', 'ASC'); // Tri par ordre croissant
                },
            ])
            ->add('details', CollectionType::class, [
                'entry_type' => DetailType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false, // Important pour que Doctrine utilise `addDetail` et `removeDetail`
            ]);

        $formUpdate = static function (FormInterface $form, ?TypeExpense $typeExpense) {
            $form->add("expense", EntityType::class, [
                "class" => Expense::class,
                "choice_label" => "name",
                "placeholder" => "Sélectionnez la nature de dépense",
                "query_builder" => function (ExpenseRepository $er) use ($typeExpense) {
                    return $er
                        ->createQueryBuilder('e')
                        ->where("e.typeExpense = :type")
                        ->setParameter("type", $typeExpense)
                        ->orderBy('e.name', 'ASC');
                },
            ]);
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formUpdate) {
                /** @var Fdb $data */
                $data = $event->getData();
                $formUpdate($event->getForm(), $data->getTypeExpense());
            }
        );

        $builder->get('typeExpense')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formUpdate) {
                $typeExpense = $event->getForm()->getData();
                $form = $event->getForm()->getParent();
                $formUpdate($form, $typeExpense);
            }
        );

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            /** @var Fdb $fdb */
            $fdb = $event->getData();
            $total = 0;
            foreach ($fdb->getDetails() as $d) {
                $total += $d->getMontant();
            }
            $fdb->setTotal($total);
        });

        // Ajout de l'événement pour ajuster le formulaire selon le rôle
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            /** @var Fdb $fdb */
            $fdb = $event->getData();
            $form = $event->getForm();

            // Ajuster selon les rôles ici si nécessaire
        });
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fdb::class,
        ]);
    }
}
