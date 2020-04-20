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
        'big_increment' => [
            'native' => 'big increment',
            'default_options' => [
                'visible', 'not_zero', 'unsigned', 'require_sign', 'big_number',
            ],
        ],
        'big_integer' => [
            'native' => 'big integer',
            'default_options' => [
                'visible', 'fillable', 'required', 'big_number',
            ],
        ],
        'big_unsigned_integer' => [
            'native' => 'big unsigned integer',
            'default_options' => [
                'visible', 'fillable', 'required', 'unsigned', 'big_number',
            ],
        ],
        'binary' => [
            'native' => 'binary',
            'default_options' => [
                'fillable', 'required',
            ],
        ],
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
        'date_time' => [
            'native' => 'date time',
            'default_options' => [
                'visible', 'fillable', 'required',
            ],
        ],
        'decimal' => [
            'native' => 'decimal',
            'default_options' => [
                'visible', 'fillable', 'required',
            ],
        ],
        'unsigned_decimal' => [
            'native' => 'unsigned decimal',
            'default_options' => [
                'visible', 'fillable', 'required', 'unsigned',
            ],
        ],
        'big_decimal' => [
            'native' => 'unsigned decimal',
            'default_options' => [
                'visible', 'fillable', 'required', 'big',
            ],
        ],
        'small_decimal' => [
            'native' => 'unsigned decimal',
            'default_options' => [
                'visible', 'fillable', 'required', 'small',
            ],
        ],
        'big_unsigned_decimal' => [
            'native' => 'unsigned decimal',
            'default_options' => [
                'visible', 'fillable', 'required', 'unsigned', 'big',
            ],
        ],
        'small_unsigned_decimal' => [
            'native' => 'unsigned decimal',
            'default_options' => [
                'visible', 'fillable', 'required', 'unsigned', 'small',
            ],
        ],
        'email' => [
            'native' => 'email',
            'default_options' => [
                'visible', 'fillable', 'required', 'restrict',
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
        'big_integer' => [
            'native' => 'unsigned integer',
            'default_options' => [
                'visible', 'fillable', 'required', 'big',
            ],
        ],
        'small_integer' => [
            'native' => 'unsigned integer',
            'default_options' => [
                'visible', 'fillable', 'required', 'small',
            ],
        ],
        'big_unsigned_integer' => [
            'native' => 'unsigned integer',
            'default_options' => [
                'visible', 'fillable', 'required', 'unsigned', 'big',
            ],
        ],
        'small_unsigned_integer' => [
            'native' => 'unsigned integer',
            'default_options' => [
                'visible', 'fillable', 'required', 'unsigned', 'small',
            ],
        ],
        'json' => [
            'native' => 'json',
            'default_options' => [
                'visible', 'fillable', 'required',
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
        'uri' => [
            'native' => 'uri',
            'default_options' => [
                'visible', 'fillable', 'required', 'restrict',
            ],
        ],
    ],

];
