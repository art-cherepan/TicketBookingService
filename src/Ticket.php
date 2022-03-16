<?php

namespace App\Domain\Booking\Entity;

final class Ticket
{
    private int $id;
    private int $sessionId;

    public function __construct(int $id, int $sessionId)
    {
        $this->id = $id;
        $this->sessionId = $sessionId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }
}