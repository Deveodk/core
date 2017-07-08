<?php

namespace Api\V1\User\Exceptions;

use Infrastructure\Exceptions\Http\NotFoundException as Exception;

class UserNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct('User.');
    }
}
