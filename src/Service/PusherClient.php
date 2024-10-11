<?php

namespace App\Service;

use App\Utils\NotifyInterface;
use Pusher\Pusher;

class PusherClient implements NotifyInterface
{

    private Pusher $pusher;

    public function __construct(Pusher $pusher)
    {
        $this->pusher = $pusher;
    }

    public function publish(string $topic, mixed $data)
    {
        $this->pusher->trigger('notification', $topic, $data);
    }
}