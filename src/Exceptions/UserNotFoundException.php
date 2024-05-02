<?php

namespace MiniRest\Exceptions;

use MiniRest\Helpers\StatusCode\StatusCode;

class UserNotFoundException extends \Exception
{
    public function __construct(string $message = 'User not found!', int $code = StatusCode::NOT_FOUND, \Exception $previous = null)
    {
        parent::__construct($message, $code);
    }
}