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
use Symfony\Component\Uid\Uuid;

$client = new Client(Uuid::v4(), new ClientName('Иван'), new ClientPhoneNumber('9997774444'));

$tickets = [
    new Ticket(Uuid::v4(), Uuid::v4()),
    new Ticket(Uuid::v4(), Uuid::v4()),
    new Ticket(Uuid::v4(), Uuid::v4()),
];

var_dump($tickets);

$date = new DateTimeImmutable('2022-04-01');

$timeStart = $date->setTime('20', '00', '00');

$timeEnd = $date->setTime('22', '30', '00');

$session = new Session(Uuid::v4(), $date, $timeStart, $timeEnd, $tickets, 'Веном 2');
//
//$ticket = $tickets[0];
//
//$bookedTickedRecord = new BookedTicketRecord(1, $client, $session, $ticket);
//
//$bookedTickedRecord->bookedTicket();
//
//var_dump([
//    $bookedTickedRecord->getClientName(),
//    $bookedTickedRecord->getClientPhoneNumber(),
//    $bookedTickedRecord->getFilmName(),
//    $bookedTickedRecord->getSessionDate(),
//    $bookedTickedRecord->getSessionStartTime(),
//    $bookedTickedRecord->getSessionEndTime(),
//]);