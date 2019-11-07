<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Type manager
    |--------------------------------------------------------------------------
    |
    | This option defines the class that will manage all types.
    |
    */

    'manager' => 'Laramore\\Elements\\TypeManager',

    /*
    |--------------------------------------------------------------------------
    | Default types
    |--------------------------------------------------------------------------
    |
    | This option defines the default types used by fields.
    |
    */

    'defaults' => [
        'boolean' => 'bool',
        'integer' => 'integer',
        'unsignedInteger' => 'integer',
        'increment' => 'integer',
        'string' => 'string',
        'text' => 'string',
        'char' => 'string',
        'timestamp' => 'string',
        'datetime' => 'string',
        'enum' => 'enum',
    ],

];
