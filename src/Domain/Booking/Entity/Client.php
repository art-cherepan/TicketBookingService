<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\ValueObject\ClientName;
use App\Domain\Booking\Entity\ValueObject\ClientPhoneNumber;
use Symfony\Component\Uid\UuidV4;

final class Client
{
    public function __construct(
        private UuidV4 $id,
        private ClientName $clientName,
        private ClientPhoneNumber $phoneNumber,
    ) {}

    public function getId(): UuidV4
    {
        return $this->id;
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
