<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\ValueObject\ClientName;
use App\Domain\Booking\Entity\ValueObject\ClientPhoneNumber;

final class Client
{
    private ClientName $clientName;
    private ClientPhoneNumber $phoneNumber;

    public function __construct($clientName, $phoneNumber)
    {
        $this->clientName = $clientName;
        $this->phoneNumber = $phoneNumber;
    }

    public function getClientName(): string
    {
        return $this->clientName;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}