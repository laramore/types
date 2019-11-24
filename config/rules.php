<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Rule manager
    |--------------------------------------------------------------------------
    |
    | This option defines the class that will manage all rules.
    |
    */

    'manager' => Laramore\Elements\RuleManager::class,

    /*
    |--------------------------------------------------------------------------
    | Default rules
    |--------------------------------------------------------------------------
    |
    | This option defines the default rules used in fields.
    |
    */

    'configurations' => [
        'nullable' => [
            'description' => 'Set the value as nullable by default',
            'removes' => [
                'not_nullable',
            ],
        ],
        'not_nullable' => [
            'description' => 'Forbid to be nullable',
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
            'description' => 'Force the value to be of the right sign',
        ],
        'not_zero' => [
            'description' => 'Forbid value zero',
        ],
        'not_blank' => [
            'description' => 'Forbid blank value',
        ],
        'trim' => [
            'description' => 'Trim value',
        ],
        'need_lowercase' => [
            'description' => 'Need at least one lowercase caracter',
        ],
        'need_uppercase' => [
            'description' => 'Need at least one uppercase caracter',
        ],
        'need_number' => [
            'description' => 'Need at least one number caracter',
        ],
        'need_special' => [
            'description' => 'Need at least one special caracter',
        ],
        'accept_username' => [
            'description' => 'Accept to have only a username instead of a full definition (email)',
        ],
        'restrict_domains' => [
            'description' => 'Only accept a range of domains',
        ],
        'caracter_resize' => [
            'description' => 'Cut the value at the decided length',
        ],
        'word_resize' => [
            'description' => 'Cut the value at the decided length, without cutting a word',
        ],
        'sentence_resize' => [
            'description' => 'Cut the value at the decided length, without cutting a sentence',
        ],
        'dots_on_resize' => [
            'description' => 'Add dots if the value is cut',
        ],
        'use_current' => [
            'description' => 'Use the current value',
        ],
    ],

];
