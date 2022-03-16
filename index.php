<?php

require_once __DIR__ . '/vendor/autoload.php';

use \App\Domain\Booking\Entity\Client;
use \App\Domain\Booking\Entity\Ticket;
use \App\Domain\Booking\Entity\Session;
use \App\Domain\Booking\Entity\BookedTicketRecord;
use \App\Domain\Booking\Entity\ValueObject\ClientName;
use \App\Domain\Booking\Entity\ValueObject\ClientPhoneNumber;
use \App\Domain\Booking\Entity\ValueObject\SessionDate;
use \App\Domain\Booking\Entity\ValueObject\SessionTime;

$client = new Client(new ClientName('Иван'), new ClientPhoneNumber('9997774444'));

$tickets = [
    new Ticket(1, 1),
    new Ticket(2, 1),
    new Ticket(3, 1),
    new Ticket(4, 1),
    new Ticket(5, 1),
    new Ticket(6, 1),
    new Ticket(7, 1),
    new Ticket(8, 1),
    new Ticket(9, 1),
    new Ticket(10, 1),
];

$session = new Session(1, new SessionDate('2022-04-01'), new SessionTime('20:00'), new SessionTime('22:30'), $tickets, 'Веном 2');

$ticket = $tickets[0];

$bookedTickedRecord = new BookedTicketRecord(1, $client, $session, $ticket);

var_dump($bookedTickedRecord->bookedTicket());