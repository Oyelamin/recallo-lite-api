<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class ClientErrorException extends Exception
{
    public function __construct(string|array $message, $code = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct($message, $code);
    }
}
