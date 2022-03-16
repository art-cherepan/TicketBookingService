<?php

namespace App\Exception;

class NonValidDateException extends \DomainException
{
    public function __construct()
    {
        $message = 'A session date have not a valid format.';

        parent::__construct($message);
    }
}
