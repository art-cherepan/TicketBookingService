<?php


namespace App\Domain\Booking\Entity\ValueObject;


use http\Exception\RuntimeException;

final class SessionTime
{
    private string $sessionTime;

    public function __construct(string $sessionTime)
    {
        $this->validate($sessionTime);

        $this->sessionTime = $sessionTime;
    }

    private function validate(string $sessionDate): void
    {
        if (preg_match('/[0-2][0-9]:[0-5][0-9]/i', $sessionDate) === false) {
            throw new RuntimeException('A session date have not a valid format.');
        }
    }

    public function getValue(): string
    {
        return $this->sessionTime;
    }
}