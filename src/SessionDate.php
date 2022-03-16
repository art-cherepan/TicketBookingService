<?php


namespace App\Domain\Booking\Entity\ValueObject;

use http\Exception\RuntimeException;

final class SessionDate
{
    private string $sessionDate;

    public function __construct(string $sessionDate)
    {
        $this->validate($sessionDate);

        $this->sessionDate = $sessionDate;
    }

    private function validate(string $sessionDate): void
    {
        if (preg_match('/20[0-9][0-9]-[0-1][1-2]-[0-3][1-9]/i', $sessionDate) === false) {
            throw new RuntimeException('A session date have not a valid format.');
        }
    }

    public function getValue(): string
    {
        return $this->sessionDate;
    }
}