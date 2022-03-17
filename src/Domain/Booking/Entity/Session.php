<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\Collections\TicketCollection;
use App\Exception\InvalidSessionIdException;
use App\Exception\NonFreeTicketsException;
use DateTimeImmutable;
use Symfony\Component\Uid\UuidV4;

final class Session
{
    public function __construct(
        private UuidV4 $id,
        private DateTimeImmutable $sessionDate,
        private DateTimeImmutable $sessionStartTime,
        private DateTimeImmutable $sessionEndTime,
        private TicketCollection $tickets,
        private string $filmName,
    ) {
        if (!$this->tickets->areForSession($this)) {
            throw new InvalidSessionIdException();
        }
    }

    public function getId(): UuidV4
    {
        return $this->id;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->sessionDate;
    }

    public function getStartTime(): DateTimeImmutable
    {
        return $this->sessionStartTime;
    }

    public function getEndTime(): DateTimeImmutable
    {
        return $this->sessionEndTime;
    }

    public function getFilmName(): string
    {
        return $this->filmName;
    }

    public function toBookATicket(Ticket $ticket): void
    {
        if (!$this->getTickets()->count()) {
            throw new NonFreeTicketsException();
        }

        $this->tickets = $this->getTickets()->withoutTicket($ticket);
    }

    private function getTickets(): TicketCollection
    {
        return $this->tickets;
    }
}
