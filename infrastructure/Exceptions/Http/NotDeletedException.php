<?php

namespace Infrastructure\Exceptions\Http;

use Symfony\Component\HttpKernel\Exception\HttpException;

class NotDeletedException extends HttpException
{
    public function __construct($message)
    {
        parent::__construct(400, $message);
    }
}
