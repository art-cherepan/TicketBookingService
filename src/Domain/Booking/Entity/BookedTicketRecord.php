<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\ValueObject\ClientName;
use App\Domain\Booking\Entity\ValueObject\ClientPhoneNumber;
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

    public function getSessionDate(): DateTimeImmutable
    {
        return $this->session->getDate();
    }

    public function getSessionStartTime(): DateTimeImmutable
    {
        return $this->session->getStartTime();
    }

    public function getSessionEndTime(): DateTimeImmutable
    {
        return $this->session->getEndTime();
    }

    public function getFilmName(): string
    {
        return $this->session->getFilmName();
    }

    public function getClientName(): ClientName
    {
        return $this->client->getName();
    }

    public function getClientPhoneNumber(): ClientPhoneNumber
    {
        return $this->client->getPhoneNumber();
    }
}
