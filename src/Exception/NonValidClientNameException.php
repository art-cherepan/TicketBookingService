<?php

namespace App\Exception;

class NonValidClientNameException extends \DomainException
{
    public function __construct()
    {
        $message = 'A family name have not a valid format.';

        parent::__construct($message);
    }
}
