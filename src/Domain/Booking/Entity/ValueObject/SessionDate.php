<?php

namespace App\Domain\Booking\Entity\ValueObject;

use App\Exception\NonValidDateException;

final class SessionDate
{
    public function __construct(
        private string $sessionDate,
    ) {
        $this->validate($sessionDate);
    }

    public function getValue(): string
    {
        return $this->sessionDate;
    }

    private function validate(string $sessionDate): void
    {
        if (preg_match('/20[0-9][0-9]-[0-1][1-9]-[0-3][1-9]/i', $sessionDate) === 0) {
            throw new NonValidDateException();
        }
    }
}
