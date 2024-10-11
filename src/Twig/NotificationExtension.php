<?php

namespace App\Twig;

use App\Service\NotificationService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class NotificationExtension extends AbstractExtension
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_unread_notifications', [$this, 'getUnreadNotifications']),
            new TwigFunction('get_unread_count', [$this, 'getUnreadCount']),
        ];
    }

    public function getUnreadNotifications($user)
    {
        return $this->notificationService->getUnreadNotifications($user);
    }

    public function getUnreadCount($user)
    {
        return $this->notificationService->getUnreadCount($user);
    }
}