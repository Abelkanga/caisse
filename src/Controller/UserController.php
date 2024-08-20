<?php


namespace App\Controller;

use App\Entity\ResetPasswordRequest;
use App\Entity\User;
use App\Form\ResetPasswordRequestFormType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
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
//        return $this->render('user/index.html.twig', [
//            'users' => $userRepository->findAll(),
//        ]);

        // Utiliser la méthode personnalisée pour récupérer les utilisateurs filtrés
        $users = $userRepository->findAllExcludingAdmins();

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
            $plaintextPassword = $form->get('password')->getData();
            $hashedPassword = $passwordHasher->hashPassword($user, $plaintextPassword);
            $user->setPassword($hashedPassword);

            // Si un formulaire ou un autre processus permet d'associer une caisse à cet utilisateur :
            if ($user->getCaisse()) {
                $caisse = $user->getCaisse();
                $caisse->setUser($user); // S'assurer que la caisse est bien associée à cet utilisateur
            }

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
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher, Security $security): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plaintextPassword = $form->get('password')->getData();
            $hashedPassword = $passwordHasher->hashPassword($user, $plaintextPassword);
            $user->setPassword($hashedPassword);
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

    #[Route('/update_password', name: 'app_user_update', methods: ['GET', 'POST'])]
    public function ResetPasswordRequest(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $passwordHasher) : Response
    {
        $resetPasswordRequest = new ResetPasswordRequest();
        $form =  $this->createForm(ResetPasswordRequestFormType::class, $resetPasswordRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $newPasswordEncoded = $passwordHasher->hashPassword($user, $resetPasswordRequest->getNewPassword());
            $userRepository->resetPasswordRequest($user, $newPasswordEncoded);

            flash()
                ->options([
                    'timeout' => 5000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Mot de passe modifié avec succès !');


            return $this->redirectToRoute('app_welcome');
        }
    }

}
