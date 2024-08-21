<?php

namespace App\Controller;

use App\Entity\UpdatePassword;
use App\Entity\User;
use App\Form\UpdatePasswordType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('account/', name: 'account_')]
class UpdatePasswordController extends AbstractController
{
    public function __construct(private EntityManagerInterface $manager)
    {
    }

    #[Route('profile', name: 'profile', methods: ['GET', 'POST'])]
    public function edit(
        Request $request
    ): Response {
        /** @var User $user */
        $user = $this->getUser();

        $account = (new User())
            ->setEmail($user->getEmail())
            ->setFullName($user->getFullName())
            ->setPseudo($user->getPseudo())
            ->setFonction($user->getFonction())
            ->setContact($user->getContact());

        $form = $this->createForm(UserType::class, $account);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user
                ->setContact($account->getContact())
                ->setFullName($account->getFullName())
                ->setPseudo($account->getPseudo())
                ->setFonction($account->getFonction())
                ->setEmail($account->getEmail());

            $this->manager->persist($user);
            $this->manager->flush();


            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Les informations du compte ont été mises à jour');


            return $this->redirectToRoute('app_welcome');
        }

        return $this->render('user/edit.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('update_password', name: 'update_recover', methods: ['GET', 'POST'])]
    public function updatePassword(
        Request                     $request,
        UserRepository              $userRepository,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        $updatePassword = new UpdatePassword();
        $form = $this->createForm(UpdatePasswordType::class, $updatePassword);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $newPasswordEncoded = $passwordHasher->hashPassword($user, $updatePassword->getNewPassword());
            $userRepository->upgradePassword($user, $newPasswordEncoded);



            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Mot de passe modifié avec succès');

            return $this->redirectToRoute('app_welcome');
        }

        return $this->render('user/updatePassword.html.twig', [
            'form' => $form
        ]);
    }
}
