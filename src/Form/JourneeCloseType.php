<?php

namespace App\Form;

use App\Entity\Billetage;
use App\Repository\JourneeRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JourneeCloseType extends AbstractType
{

    public function __construct(
        private JourneeRepository $journeeRepository,
        private Security $security
    )
    {
    }


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('balance', TextType::class, [
                "attr" => [
                    "readonly" => "readonly",
                ]
            ])
            ->add('amount', TextType::class)
            ->add('ecart', TextType::class, [
                "attr" => [
                    "readonly" => "readonly",
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Billetage::class,
        ]);
    }
}
