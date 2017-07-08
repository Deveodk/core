<?php

namespace Infrastructure\Exceptions\Http;

use Symfony\Component\HttpKernel\Exception\HttpException;

class NotFoundException extends HttpException
{
    public function __construct($message)
    {
        parent::__construct(404, $message);
    }
}
