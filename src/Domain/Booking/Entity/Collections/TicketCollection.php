<?php

namespace App\Domain\Booking\Entity\Collections;

use App\Domain\Booking\Entity\Session;
use App\Domain\Booking\Entity\Ticket;
use ArrayIterator;
use IteratorAggregate;

class TicketCollection implements IteratorAggregate
{
    /**
     * @param array<Ticket> $tickets
     */
    public function __construct(
        private array $tickets,
    ) {}

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this);
    }

    public function count(): int
    {
        return count($this->tickets);
    }

    public function withoutTicket(Ticket $ticket): TicketCollection
    {
        $newTicketCollection = $this->tickets;

        foreach ($newTicketCollection as $sessionTicket) {
            if ($sessionTicket->getId() !== $ticket->getId()) {
                continue;
            }

            unset($newTicketCollection[array_search($ticket, $this->tickets, null)]);
        }

        return new TicketCollection($newTicketCollection);
    }

    public function areForSession(Session $session): bool
    {
        foreach ($this->tickets as $ticket) {
            if ($ticket->getSessionId() !== $session->getId()) {
                return false;
            }
        }

        return true;
    }
}
