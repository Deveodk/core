<?php

namespace Api\V1\User\Exceptions;

use Infrastructure\Exceptions\Http\NotDeletedException as Exception;

class UserNotDeletedException extends Exception
{
    public function __construct()
    {
        parent::__construct('User.');
    }
}
