<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    #[Route('/registration', name: 'app_registration', methods: ['GET', 'POST'])]
    public function index(UserPasswordHasherInterface $passwordHasher, Request $request, EntityManagerInterface $manager): Response
    {
        $user = new User();
        $user->setRoles(['ROLES_USER']);
        $plaintextPassword = 'password';
        
          $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        
// Créer un formulaire d'inscription pour l'utilisateur
$form = $this->createForm(RegistrationType::class, $user);

// Traiter la soumission du formulaire et enregistrer l'utilisateur
$form->handleRequest($request);
if ($form->isSubmitted() && $form->isValid()) {
    $user = $form->getData();
    $this->addFlash(
        'success',
        'Votre compte a bien été créé.'
    );
    $manager->persist($user);
    $manager->flush();

    // Rediriger vers la page de connexion après la création du compte
    return $this->redirectToRoute('app_login');
}



return $this->render('registration/index.html.twig', [
    'form' => $form->createView()
]);
    }
}
