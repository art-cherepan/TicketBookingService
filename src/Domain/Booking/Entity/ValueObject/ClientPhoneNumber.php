<?php

namespace App\Domain\Booking\Entity\ValueObject;

use App\Exception\NonValidClientPhoneException;

final class ClientPhoneNumber
{
    private const VALID_PHONE_NUMBER_PATTERN = '/^[0-9]{10,10}+$/';

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
        if (preg_match(self::VALID_PHONE_NUMBER_PATTERN, $phoneNumber) === 0) {
            throw new NonValidClientPhoneException();
        }
    }
}
