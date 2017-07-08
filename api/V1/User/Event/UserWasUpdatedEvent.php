<?php

namespace Api\V1\User\Event;

use Infrastructure\Events\Event as Events;

class UserWasUpdatedEvent extends Events
{
    /** @var object */
    public $data;

    /**
    * Create a new event instance.
    * @param object
    */
    public function __construct($data)
    {
        $this->data = $data;
    }
}
