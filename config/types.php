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

    'manager' => Laramore\Elements\TypeManager::class,

    /*
    |--------------------------------------------------------------------------
    | Default types
    |--------------------------------------------------------------------------
    |
    | This option defines the default types used by fields.
    |
    */

    'configurations' => [
        'boolean' => [
            'native' => 'bool',
            'default_rules' => [
                'visible', 'fillable', 'required',
            ],
        ],
        'char' => [
            'native' => 'char',
            'default_rules' => [
                'visible', 'fillable', 'required', 'caracter_resize',
            ],
        ],
        'composite' => [
            'native' => 'composite',
            'default_rules' => [
                'visible', 'fillable',
            ],
        ],
        'email' => [
            'native' => 'email',
            'default_rules' => [
                'visible', 'fillable', 'required', 'not_nullable',
            ],
        ],
        'enum' => [
            'native' => 'enum',
            'default_rules' => [
                'visible', 'fillable', 'required',
            ],
        ],
        'increment' => [
            'native' => 'increment',
            'default_rules' => [
                'visible', 'not_zero', 'unsigned', 'require_sign',
            ],
        ],
        'integer' => [
            'native' => 'integer',
            'default_rules' => [
                'visible', 'fillable', 'required',

            ],
        ],
        'unsigned_integer' => [
            'native' => 'unsigned integer',
            'default_rules' => [
                'visible', 'fillable', 'required', 'unsigned',
            ],
        ],
        'link' => [
            'native' => 'link',
            'default_rules' => [
                'visible', 'fillable',
            ],
        ],
        'password' => [
            'native' => 'password',
            'default_rules' => [
                'fillable', 'required', 'need_lowercase', 'need_uppercase', 'need_number'
            ],
        ],
        'primary_id' => [
            'native' => 'primary id',
            'default_rules' => [
                'visible', 'not_zero', 'unsigned', 'require_sign', 'not_nullable',
            ],
        ],
        'pattern' => [
            'native' => 'pattern',
            'default_rules' => [
                'visible', 'fillable', 'required',
            ],
        ],
        'text' => [
            'native' => 'text',
            'default_rules' => [
                'visible', 'fillable', 'required', 'not_blank',
            ],
        ],
        'timestamp' => [
            'native' => 'timestamp',
            'default_rules' => [
                'visible', 'fillable', 'required',
            ],
        ],
    ],

];
