<?php

namespace App\Domain\Booking\Entity\ValueObject;

use App\Exception\NonValidClientNameException;

final class ClientName
{
    public function __construct(
        private string $clientName,
    ) {
        $this->validate($clientName);
    }

    public function getValue(): string
    {
        return $this->clientName;
    }

    private function validate(string $clientName): void
    {
        if (preg_match('/^[а-яёА-ЯЁ\s]+$/u', $clientName) === 0) {
            throw new NonValidClientNameException();
        }
    }
}
