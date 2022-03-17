<?php

namespace App\Domain\Booking\Entity;

use Symfony\Component\Uid\UuidV4;

final class Ticket
{
    public function __construct(
        private UuidV4 $id,
        private UuidV4 $sessionId,
    ) {}

    public function getId(): UuidV4
    {
        return $this->id;
    }

    public function getSessionId(): UuidV4
    {
        return $this->sessionId;
    }
}
