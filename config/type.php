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
    | A field has a type. The type describes its default options,
    | its required type value. Also, other packages can define
    | the field factory type, its migration type, etc.
    |
    */

    'configurations' => [
        'boolean' => [
            'native' => 'bool',
            'default_options' => [
                'visible', 'fillable', 'required',
            ],
        ],
        'char' => [
            'native' => 'char',
            'default_options' => [
                'visible', 'fillable', 'required',
            ],
        ],
        'composed' => [
            'native' => 'composed',
            'default_options' => [
                'visible', 'fillable', 'required',
            ],
        ],
        'email' => [
            'native' => 'email',
            'default_options' => [
                'visible', 'fillable', 'required', 'not_nullable',
            ],
        ],
        'enum' => [
            'native' => 'enum',
            'default_options' => [
                'visible', 'fillable', 'required',
            ],
        ],
        'increment' => [
            'native' => 'increment',
            'default_options' => [
                'visible', 'not_zero', 'unsigned', 'require_sign',
            ],
        ],
        'integer' => [
            'native' => 'integer',
            'default_options' => [
                'visible', 'fillable', 'required',

            ],
        ],
        'unsigned_integer' => [
            'native' => 'unsigned integer',
            'default_options' => [
                'visible', 'fillable', 'required', 'unsigned',
            ],
        ],
        'link' => [
            'native' => 'link',
            'default_options' => [
                'visible', 'fillable',
            ],
        ],
        'password' => [
            'native' => 'password',
            'default_options' => [
                'fillable', 'required', 'need_lowercase', 'need_uppercase', 'need_number'
            ],
        ],
        'primary_id' => [
            'native' => 'primary id',
            'default_options' => [
                'visible', 'not_zero', 'unsigned', 'require_sign', 'not_nullable',
            ],
        ],
        'pattern' => [
            'native' => 'pattern',
            'default_options' => [
                'visible', 'fillable', 'required',
            ],
        ],
        'text' => [
            'native' => 'text',
            'default_options' => [
                'visible', 'fillable', 'required', 'not_blank',
            ],
        ],
        'timestamp' => [
            'native' => 'timestamp',
            'default_options' => [
                'visible', 'fillable', 'required',
            ],
        ],
    ],

];
