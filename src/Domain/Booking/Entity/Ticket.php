<?php

namespace App\Domain\Booking\Entity;

final class Ticket
{
    public function __construct(
        private int $id,
        private int $sessionId,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }
}
