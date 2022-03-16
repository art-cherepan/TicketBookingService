<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\ValueObject\SessionDate;
use App\Domain\Booking\Entity\ValueObject\SessionTime;
use http\Exception\RuntimeException;

final class Session
{
    private SessionDate $sessionDate;
    private SessionTime $sessionStartTime;
    private SessionTime $sessionEndTime;
    private array $tickets;
    private string $filmName;
    private int $id;

    /**
     * Session constructor.
     * @param int $id
     * @param SessionDate $sessionDate
     * @param SessionTime $sessionStartTime
     * @param SessionTime $sessionEndTime
     * @param Ticket[] $tickets
     * @param string $filmName
     */
    public function __construct(int $id, SessionDate $sessionDate, SessionTime $sessionStartTime, SessionTime $sessionEndTime, array $tickets, string $filmName)
    {
        $this->id = $id;
        $this->sessionDate = $sessionDate;
        $this->sessionStartTime = $sessionStartTime;
        $this->sessionEndTime = $sessionEndTime;
        $this->filmName = $filmName;

        foreach ($tickets as $ticket) {
            if ($ticket->getSessionId() != $this->id) {
                throw new RuntimeException('A ticket session id not equal id of current session.');
            }
        }

        $this->tickets = $tickets;
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

    public function getTickets(): array
    {
        return $this->tickets;
    }

    public function getFilmName(): string
    {
        return $this->filmName;
    }

    public function toBookATicket(Ticket $ticket): bool
    {
        if ($this->getTicketCount() < 1) {
            new RuntimeException('All tickets purchased.');
        }

        foreach ($this->tickets as $sessionTicket) {
            if ($sessionTicket->getId() == $ticket->getId()) {
                unset($sessionTicket);
            }
        }

        return true;
    }

    private function getTicketCount(): int
    {
        return count($this->tickets);
    }
}