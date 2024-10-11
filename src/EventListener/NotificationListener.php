<?php

// src/EventListener/NotificationListener.php

namespace App\EventListener;

use App\Repository\NotificationRepository;
use PhpOffice\PhpSpreadsheet\Document\Security;

use Symfony\Component\HttpKernel\Event\ControllerEvent;

use Twig\Environment;

class NotificationListener
{
    private $twig;
    private $notificationRepository;
    private $security;

    public function __construct(Environment $twig, NotificationRepository $notificationRepository, Security $security)
    {
        $this->twig = $twig;
        $this->notificationRepository = $notificationRepository;
        $this->security = $security;
    }

    public function onKernelController(ControllerEvent $event)
    {
        $user = $this->security->getUser();
        if (!$user) {
            return;
        }

        $role = $user->getRoles()[0];
        $notifications = $this->notificationRepository->findBy(['role' => $role, 'vue' => false]);

        // Partager les notifications avec tous les templates
        $this->twig->addGlobal('notifications', $notifications);
    }
}
