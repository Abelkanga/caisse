<?php

namespace App\Utils;

interface NotifyInterface
{
    public function publish(string $topic, mixed $data);
}