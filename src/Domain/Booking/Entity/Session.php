<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\ValueObject\SessionDate;
use App\Domain\Booking\Entity\ValueObject\SessionTime;
use App\Exception\NonFreeTicketsException;
use http\Exception\InvalidArgumentException;

final class Session
{
    /**
     * @param array<Ticket> $tickets
     */
    public function __construct(
        private int $id,
        private SessionDate $sessionDate,
        private SessionTime $sessionStartTime,
        private SessionTime $sessionEndTime,
        private array $tickets,
        private string $filmName,
    ) {
        foreach ($tickets as $ticket) {
            if ($ticket->getSessionId() !== $this->id) {
                throw new InvalidArgumentException();
            }
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSessionDate(): SessionDate
    {
        return $this->sessionDate;
    }

    public function getSessionStartTime(): SessionTime
    {
        return $this->sessionStartTime;
    }

    public function getSessionEndTime(): SessionTime
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
