<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Option manager
    |--------------------------------------------------------------------------
    |
    | This option defines the class that will manage all options.
    |
    */

    'manager' => Laramore\Elements\OptionManager::class,

    /*
    |--------------------------------------------------------------------------
    | Default options
    |--------------------------------------------------------------------------
    |
    | This option defines the default options used in fields.
    |
    */

    'configurations' => [
        'big_number' => [
            'description' => 'Big number value',
            'removes' => [
                'small_number',
            ],
        ],
        'nullable' => [
            'description' => 'Nullable value by default',
            'removes' => [
                'not_nullable',
            ],
        ],
        'not_nullable' => [
            'native' => 'not nullable',
            'description' => 'Cannot be nullable',
            'removes' => [
                'nullable',
            ],
        ],
        'visible' => [
            'description' => 'Set as visible',
        ],
        'fillable' => [
            'description' => 'Set as fillable',
        ],
        'required' => [
            'description' => 'Require a value',
            'adds' => [
                'fillable',
            ],
        ],
        'unsigned' => [
            'description' => 'Force a value to be unsigned',
        ],
        'negative' => [
            'description' => 'Force the value to be negative',
            'adds' => [
                'unsigned',
            ],
        ],
        'require_sign' => [
            'native' => 'require sign',
            'description' => 'Force the value to be of the right sign',
        ],
        'small_number' => [
            'description' => 'Small number value',
            'removes' => [
                'big_number',
            ],
        ],
        'not_zero' => [
            'native' => 'not zero',
            'description' => 'Forbid value zero',
        ],
        'not_blank' => [
            'native' => 'not blank',
            'description' => 'Forbid blank value',
        ],
        'trim' => [
            'description' => 'Trim value',
        ],
        'need_lowercase' => [
            'native' => 'need lowercase',
            'description' => 'Need at least one lowercase caracter',
        ],
        'need_uppercase' => [
            'native' => 'need uppercase',
            'description' => 'Need at least one uppercase caracter',
        ],
        'need_number' => [
            'native' => 'need number',
            'description' => 'Need at least one number caracter',
        ],
        'need_special' => [
            'native' => 'need special',
            'description' => 'Need at least one special caracter',
        ],
        'fixable' => [
            'native' => 'fixable',
            'description' => 'Accept fixable values and auto fix them',
        ],
        'restrict' => [
            'native' => 'restrict',
            'description' => 'Restrict to specific values',
        ],
        'use_current' => [
            'native' => 'use current',
            'description' => 'Use the current value',
        ],
        'append' => [
            'description' => 'Append extra value',
            'propagate' => false,
            'adds' => [
                'visible',
            ],
        ],
        'with' => [
            'description' => 'Autoload the relation',
            'propagate' => false,
            'removes' => [
                'with_count',
            ],
        ],
        'with_count' => [
            'native' => 'with count',
            'description' => 'Autoload the number of the relation',
            'propagate' => false,
            'removes' => [
                'with',
            ],
        ],
    ],

];
