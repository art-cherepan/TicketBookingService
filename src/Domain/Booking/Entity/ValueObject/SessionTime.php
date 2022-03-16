<?php

namespace App\Domain\Booking\Entity\ValueObject;

use App\Exception\NonValidTimeException;

final class SessionTime
{
    public function __construct(
        private string $sessionTime,
    ) {
        $this->validate($sessionTime);
    }

    public function getValue(): string
    {
        return $this->sessionTime;
    }

    private function validate(string $sessionDate): void
    {
        if (preg_match('/[0-2][0-9]:[0-5][0-9]/i', $sessionDate) === 0) {
            throw new NonValidTimeException();
        }
    }
}
