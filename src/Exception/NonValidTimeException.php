<?php

namespace App\Exception;

class NonValidTimeException extends \DomainException
{
    public function __construct()
    {
        $message = 'A session date have not a valid format.';

        parent::__construct($message);
    }
}
