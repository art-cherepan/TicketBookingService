<?php

namespace App\Domain\Booking\Entity;

use Symfony\Component\Uid\UuidV4;

final class Ticket
{
    public function __construct(
        private UuidV4 $id,
        private Session $session,
    ) {}

    public function getId(): UuidV4
    {
        return $this->id;
    }

    public function getSession(): Session
    {
        return $this->session;
    }
}
