<?php

namespace App\Service;

use Pusher\Pusher;

class PusherService
{
    private $pusher;

    public function __construct(string $pusherAppId, string $pusherAppKey, string $pusherAppSecret, string $pusherAppCluster)
    {
        $this->pusher = new Pusher($pusherAppKey, $pusherAppSecret, $pusherAppId, [
            'cluster' => $pusherAppCluster,
            'useTLS' => true,
        ]);
    }

    public function trigger(string $channel, string $event, array $data)
    {
        $this->pusher->trigger($channel, $event, $data);
    }
}
