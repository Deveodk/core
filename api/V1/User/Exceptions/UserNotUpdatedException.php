<?php

namespace Api\V1\User\Exceptions;

use Infrastructure\Exceptions\Http\NotUpdatedException as Exception;

class UserNotUpdatedException extends Exception
{
    public function __construct()
    {
        parent::__construct('User.');
    }
}
