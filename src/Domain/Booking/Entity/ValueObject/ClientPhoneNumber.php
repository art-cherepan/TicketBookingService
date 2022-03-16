<?php

namespace App\Domain\Booking\Entity\ValueObject;

use App\Exception\NonValidClientPhoneException;

final class ClientPhoneNumber
{
    public function __construct(
        private string $phoneNumber,
    ) {
        $this->validate($phoneNumber);
    }

    public function getValue(): string
    {
        return $this->phoneNumber;
    }

    private function validate(string $phoneNumber): void
    {
        if (preg_match('/^[0-9]{10,10}+$/', $phoneNumber) === 0) {
            throw new NonValidClientPhoneException();
        }
    }
}
