<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\Collections\TicketCollection;
use App\Exception\NonFreeTicketsException;
use DateTimeImmutable;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

final class Session
{
    private TicketCollection $tickets;

    public function __construct(
        private UuidV4 $id,
        private DateTimeImmutable $date,
        private DateTimeImmutable $startTime,
        private DateTimeImmutable $endTime,
        private int $numberOfTickets,
        private string $filmName,
    ) {
        $this->tickets = $this->createTickets($this->numberOfTickets);
    }

    public function getId(): UuidV4
    {
        return $this->id;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function getStartTime(): DateTimeImmutable
    {
        return $this->startTime;
    }

    public function getEndTime(): DateTimeImmutable
    {
        return $this->endTime;
    }

    public function getFilmName(): string
    {
        return $this->filmName;
    }

    public function bookTicket(Client $client, Ticket $ticket): BookedTicketRecord
    {
        if (!$this->getTickets()->count()) {
            throw new NonFreeTicketsException();
        }

        $this->tickets = $this->getTickets()->withoutTicket($ticket);

        return new BookedTicketRecord(Uuid::v4(), $client, $this, $ticket);
    }

    public function getTickets(): TicketCollection
    {
        return $this->tickets;
    }

    private function createTickets(int $numberOfTickets): TicketCollection
    {
        $tickets = [];

        for ($i = 0; $i < $numberOfTickets; $i++) {
            $tickets[] = new Ticket(Uuid::v4(), $this);
        }

        return new TicketCollection($tickets);
    }
}
