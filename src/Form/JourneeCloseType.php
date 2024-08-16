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

        $caisse = $options['caisse'];

        $builder
            ->add('balance', TextType::class, [
                'data' => $caisse->getSoldedispo(), // Utilise le solde disponible de la caisse
                'attr' => [
                    'readonly' => true, // Rendre le champ en lecture seule si nécessaire
                ],
            ])
            ->add('amount', TextType::class)
            ->add('ecart', TextType::class, [
                'attr' => [
                    'readonly' => 'readonly',
                ],
            ]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Billetage::class,
        ]);

        // Définir l'option "caisse" et la rendre obligatoire
        $resolver->setRequired('caisse');
        $resolver->setAllowedTypes('caisse', ['App\Entity\Caisse']); // Remplacez par la classe correcte si nécessaire
    }
}
