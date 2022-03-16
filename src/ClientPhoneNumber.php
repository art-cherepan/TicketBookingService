<?php


namespace App\Domain\Booking\Entity\ValueObject;

use http\Exception\RuntimeException;

final class ClientPhoneNumber
{
    private string $phoneNumber;

    public function __construct($phoneNumber)
    {
        $this->validate($phoneNumber);

        $this->phoneNumber = $phoneNumber;
    }

    public function getValue(): string
    {
        return $this->phoneNumber;
    }

    private function validate(string $phoneNumber): void
    {
        if (filter_var($this->clearPhone($phoneNumber), FILTER_SANITIZE_NUMBER_INT) === false) {
            throw new RuntimeException('A number of phone have not a valid format.');
        }
    }

    private function clearPhone(string $phoneNumber): string
    {
        return str_replace(['+', '-', ' ', '(', ')'], '', $phoneNumber);
    }
}