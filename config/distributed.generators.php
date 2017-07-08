<?php
/*
 * This file is part of deveodk/distributed-generators
 * (c) DeveoDK <jk@deveo.dk>
 */
return [

    /*
     * The namespace that the generator
     * will look for base classes
     */
    'rootNamespace' => [
        'baseController' => 'Infrastructure/Http/BaseController',
        'baseEvent' => 'Infrastructure/Events/Event'
    ],

    /*
     *  Which type of exceptions should the
     *  make:bundle {name} --all command make
     *  and what are the base exceptions namespace
     */
    'exceptionTypes' => [
        'NotFound' => 'Infrastructure/Exceptions/Http/NotFoundException',
        'NotCreated' => 'Infrastructure/Exceptions/Http/NotCreatedException',
        'NotUpdated' => 'Infrastructure/Exceptions/Http/NotUpdatedException',
        'NotDeleted' => 'Infrastructure/Exceptions/Http/NotDeletedException',
    ],

    /*
     * Which type of events should the
     * make:bundle {name} --all command make
     */
    'eventTypes' => [
        'WasCreated',
        'WasUpdated',
        'WasDeleted'
    ],

];
