<?php

namespace Api\V1\User\Exceptions;

use Infrastructure\Exceptions\Http\NotCreatedException as Exception;

class UserNotCreatedException extends Exception
{
    public function __construct()
    {
        parent::__construct('User.');
    }
}
