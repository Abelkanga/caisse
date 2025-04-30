<?php

namespace App\Service;

use App\Entity\Fdb;
use App\Repository\NotificationRepository;


class NotificationService
{
    public function __construct(private readonly NotificationRepository $notificationsRepository)
    {
    }

    /**
     * @return array
     */
    public function getNotifies(): array
    {
        return $this->notificationsRepository->findAll();
    }

    public function createNotification(Fdb $fdb, string $role, string $message, $link): void
    {
        
    }
}