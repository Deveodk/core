<?php

namespace Infrastructure\Exceptions\Http;

use Symfony\Component\HttpKernel\Exception\HttpException;

class NotUpdatedException extends HttpException
{
    public function __construct($message)
    {
        parent::__construct(400, $message);
    }
}
