<?php

namespace App\Controller;

use App\Entity\Notification;
use App\Repository\NotificationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NotificationController extends AbstractController
{
    #[Route('/notification', name: 'app_notification')]
    public function index(
        NotificationRepository $notificationRepository
    ): Response
    {
        $notifications = $notificationRepository->findAll();
        if (count($notifications) === 0) {

            flash()
                ->options([
                    'timeout' => 5000,
                    'position' => 'bottom-right',
                ])
                ->warning('Vous n\'avez pas de notification');


            return $this->redirectToRoute('app_welcome');
        }

        return $this->render('notification/index.html.twig', [
            'notifications' => $notifications
        ]);
    }

    #[Route('/notification/read/{id}', name: 'notification_read', methods: ['POST'])]
    #[IsGranted('ROLE_MANAGER')]
    public function readNotification($id, EntityManagerInterface $entityManager): JsonResponse
    {
        $notification = $entityManager->getRepository(Notification::class)->find($id);

        if (!$notification) {
            return new JsonResponse(['error' => 'Notification not found'], 404);
        }

        // Marquer la notification comme lue
        $notification->setUnread(false);
        $entityManager->flush();

        return new JsonResponse(['success' => true]);
    }


}
