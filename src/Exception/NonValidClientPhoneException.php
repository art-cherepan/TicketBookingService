<?php

namespace App\Exception;

class NonValidClientPhoneException extends \DomainException
{
    public function __construct()
    {
        $message = 'A number of phone have not a valid format.';

        parent::__construct($message);
    }
}
