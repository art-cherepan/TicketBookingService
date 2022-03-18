<?php

require_once __DIR__ . '/vendor/autoload.php';

use \App\Domain\Booking\Entity\Client;
use \App\Domain\Booking\Entity\Ticket;
use \App\Domain\Booking\Entity\Session;
use \App\Domain\Booking\Entity\ValueObject\ClientName;
use \App\Domain\Booking\Entity\ValueObject\ClientPhoneNumber;
use \App\Domain\Booking\Entity\Collections\TicketCollection;
use Symfony\Component\Uid\Uuid;

$client = new Client(Uuid::v4(), new ClientName('Иван'), new ClientPhoneNumber('9997774444'));

$sessionUUID = Uuid::v4();

$date = new DateTimeImmutable('2022-04-01');

$timeStart = $date->setTime('20', '00', '00');

$timeEnd = $date->setTime('22', '30', '00');

$session = new Session($sessionUUID, $date, $timeStart, $timeEnd, 10, 'Веном 2');

$ticketCollection = $session->getTickets();

foreach ($ticketCollection as $ticket) {
    var_dump($ticket);
}

$session->bookTicket($client, $ticketCollection->tickets[0]);
