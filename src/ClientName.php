<?php


namespace App\Domain\Booking\Entity\ValueObject;

use http\Exception\RuntimeException;

final class ClientName
{
    private string $clientName;

    public function __construct(string $clientName)
    {
        $this->validate($clientName);

        $this->clientName = $clientName;
    }

    public function getValue()
    {
        return $this->clientName;
    }

    private function validate(string $clientName): void
    {
        if (preg_match('/^[а-яёА-ЯЁ\s]+$/u', $clientName) === false) {
            throw new RuntimeException('A family name have not a valid format.');
        }
    }
}