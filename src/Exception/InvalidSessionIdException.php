<?php

namespace App\Exception;

class InvalidSessionIdException extends \DomainException
{
    public function __construct()
    {
        $message = 'A ticket session id not equal id of current session.';

        parent::__construct($message);
    }
}
