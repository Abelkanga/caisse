<?php

namespace App\Service;

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
}