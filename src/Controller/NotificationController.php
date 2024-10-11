<?php

namespace App\Controller;

use App\Repository\NotificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
            $this->addFlash('info', 'Vous n\'avez pas de notification');

            return $this->redirectToRoute('app_welcome');
        }
        return $this->render('notification/index.html.twig', [
            'notifications' => $notifications
        ]);
    }

}
