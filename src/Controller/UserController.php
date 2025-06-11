<?php


namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/index', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        // Utiliser la nouvelle méthode pour récupérer les utilisateurs actifs excluant les admins
        $users = $userRepository->findAllActiveUsersExcludingAdmins();

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plaintextPassword = 'password';
            $hashedPassword = $passwordHasher->hashPassword($user, $plaintextPassword);
            $user->setPassword($hashedPassword);

            $entityManager->persist($user);
            $entityManager->flush();

            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->success('Utilisateur créé avec succès !');

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request                 $request,
        User                    $user,
        EntityManagerInterface  $entityManager,
        Security                $security
    ): Response {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($user->isCashier() && $security->isGranted('ROLE_ADMIN')) {
                $roles = $form->get('roles')->getData();
                $newRoles = [...$roles, 'ROLE_CASHIER'];
                $user->setRoles($newRoles);
            }

            $entityManager->flush();

            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Utilisateur modifié avec succès !');


            if ($security->isGranted('ROLE_ADMIN')) {
                return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
            } else {
                return $this->redirectToRoute('app_welcome', [], Response::HTTP_SEE_OTHER);
            }
        }

        return $this->render('user/edit.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }

    //    #[Route('/{id}/deactivate', name: 'app_user_deactivate', methods: ['POST'])]
    //    public function deactivate(User $user, EntityManagerInterface $entityManager): Response
    //    {
    //        // Désactiver l'utilisateur en mettant `isActive` à false
    //        $user->setIsActive(false);
    //
    //        // Sauvegarder les modifications
    //        $entityManager->flush();
    //
    //        flash()
    //            ->options([
    //                'timeout' => 5000,
    //                'position' => 'bottom-right',
    //            ])
    //            ->success('Utilisateur désactivé avec succès.');
    //
    //        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    //    }

    #[Route('/user/enable/{id}', name: 'user_enable')]
    public function enableUser(User $user, EntityManagerInterface $em): RedirectResponse
    {
        $user->setIsActive(true);
        $em->flush();

        return $this->redirectToRoute('app_user_index');
    }

    #[Route('/user/disable/{id}', name: 'user_disable')]
    public function disableUser(User $user, EntityManagerInterface $em): RedirectResponse
    {
        $user->setIsActive(false);
        $em->flush();

        return $this->redirectToRoute('app_user_index');
    }
}
