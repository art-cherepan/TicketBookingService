<?php

namespace App\Domain\Booking\Entity;

use DateTimeImmutable;
use Symfony\Component\Uid\UuidV4;

final class BookedTicketRecord
{
    public function __construct(
        private UuidV4 $id,
        private Client $client,
        private Session $session,
        private Ticket $ticket,
    ) {}

    public function getId(): UuidV4
    {
        return $this->id;
    }

    public function bookedTicket(): void
    {
        $this->session->toBookATicket($this->ticket);
    }

    public function getSessionDate(): DateTimeImmutable
    {
        return $this->session->getSessionDate();
    }

    public function getSessionStartTime(): DateTimeImmutable
    {
        return $this->session->getSessionStartTime();
    }

    public function getSessionEndTime(): DateTimeImmutable
    {
        return $this->session->getSessionEndTime();
    }

    public function getFilmName(): string
    {
        return $this->session->getFilmName();
    }

    public function getClientName(): string
    {
        return $this->client->getClientName();
    }

    public function getClientPhoneNumber(): string
    {
        return $this->client->getPhoneNumber();
    }
}
