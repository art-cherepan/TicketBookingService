<?php

namespace App\Domain\Booking\Entity;

final class BookedTicketRecord
{
    public function __construct(
        private int $id,
        private Client $client,
        private Session $session,
        private Ticket $ticket,
    ) {}

    public function bookedTicket(): bool
    {
        return $this->session->toBookATicket($this->ticket);
    }

    public function getSessionDate(): string
    {
        return $this->session->getSessionDate();
    }

    public function getSessionStartTime(): string
    {
        return $this->session->getSessionStartTime();
    }

    public function getSessionEndTime(): string
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
