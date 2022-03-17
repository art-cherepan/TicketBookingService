<?php

namespace App\Domain\Booking\Entity;

use App\Exception\InvalidSessionIdException;
use App\Exception\NonFreeTicketsException;
use DateTimeImmutable;
use Symfony\Component\Uid\UuidV4;

final class Session
{
    /**
     * @param array<Ticket> $tickets
     */
    public function __construct(
        private UuidV4 $id,
        private DateTimeImmutable $sessionDate,
        private DateTimeImmutable $sessionStartTime,
        private DateTimeImmutable $sessionEndTime,
        private array $tickets,
        private string $filmName,
    ) {
        foreach ($tickets as $ticket) {
            if ($ticket->getSessionId() !== $this->id) {
                throw new InvalidSessionIdException();
            }
        }
    }

    public function getId(): UuidV4
    {
        return $this->id;
    }

    public function getSessionDate(): DateTimeImmutable
    {
        return $this->sessionDate;
    }

    public function getSessionStartTime(): DateTimeImmutable
    {
        return $this->sessionStartTime;
    }

    public function getSessionEndTime(): DateTimeImmutable
    {
        return $this->sessionEndTime;
    }

    /**
     * @return array<Ticket>
     */
    public function getTickets(): array
    {
        return $this->tickets;
    }

    public function getFilmName(): string
    {
        return $this->filmName;
    }

    public function toBookATicket(Ticket $ticket): void
    {
        if ($this->getTicketCount() < 1) {
            throw new NonFreeTicketsException();
        }

        foreach ($this->tickets as $sessionTicket) {
            if ($sessionTicket->getId() !== $ticket->getId()) {
                continue;
            }

            unset($this->tickets[array_search($ticket, $this->tickets, null)]);
        }
    }

    private function getTicketCount(): int
    {
        return count($this->tickets);
    }
}
