<?php

namespace Infrastructure\Events;

abstract class Event
{
    abstract public function getData();

    abstract public function getFields();
}
