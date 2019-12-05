<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Operator manager
    |--------------------------------------------------------------------------
    |
    | This option defines the class that will manage all operators.
    |
    */

    'manager' => Laramore\Elements\OperatorManager::class,

    /*
    |--------------------------------------------------------------------------
    | Default operators
    |--------------------------------------------------------------------------
    |
    | This option defines all default operators.
    | The operators must be defined as keys.
    | There are callable for example like this:
    | > whereNumberInfOrEq(10) to specify that the field `number` must be inferior or equal to 10.
    |
    | The value could be:
    | - a `native` string: it is the operator used in database,
    | - an array with:
    |   - a `native` string (by default it is set with the key value),
    |   - a `needs` definition: force the value to be `null`, a `collection` or a `binary`.
    |
    */

    'configurations' =>  [
        'null' => [
            'needs' => 'null',
        ],
        'is_null' => [
            'native' => 'null',
            'needs' => 'null',
        ],
        'not_null' => [
            'native' => 'not null',
            'needs' => 'null',
        ],
        'is_not_null' => [
            'native' => 'not null',
            'needs' => 'null',
        ],
        'doesnt_exist' => [
            'native' => 'null',
            'needs' => 'null',
        ],
        'dont_exist' => [
            'native' => 'null',
            'needs' => 'null',
        ],
        'exist' => [
            'native' => 'not null',
            'needs' => 'null',
        ],
        'exists' => [
            'native' => 'not null',
            'needs' => 'null',
        ],
        'equal' => [
            'native' => '=',
        ],
        'eq' => [
            'native' => '=',
        ],
        'inf' => [
            'native' => '<',
        ],
        'sup' => [
            'native' => '>',
        ],
        'inf_or_eq' => [
            'native' => '<=',
        ],
        'sup_or_eq' => [
            'native' => '>=',
        ],
        'safe_not_equal' => [
            'native' => '<>',
        ],
        'not_eq' => [
            'native' => '!=',
        ],
        'not_equal' => [
            'native' => '!=',
        ],
        'safe_equal' => [
            'native' => '<=>',
        ],
        'like' => [
            'native' => 'like',
        ],
        'like_binary' => [
            'native' => 'like binary',
        ],
        'not_nike' => [
            'native' => 'not like',
        ],
        'ilike' => [
            'native' => 'ilike',
        ],
        'not_ilike' => [
            'native' => 'not ilike',
        ],
        'rlike', 'rlike',
        'regexp' => [
            'native' => 'regexp',
        ],
        'not_regexp' => [
            'native' => 'not regexp',
        ],
        'similar_to' => [
            'native' => 'similar to',
        ],
        'not_timilar_to' => [
            'native' => 'not similar to',
        ],
        'bitand' => [
            'native' => '&',
            'needs' => 'binary',
        ],
        'bitor' => [
            'native' => '|',
            'needs' => 'binary',
        ],
        'bitxor' => [
            'native' => '^',
            'needs' => 'binary',
        ],
        'bitleft' => [
            'native' => '<<',
            'needs' => 'binary',
        ],
        'bitright' => [
            'native' => '>>',
            'needs' => 'binary',
        ],
        'match' => [
            'native' => '~',
        ],
        'imatch' => [
            'native' => '~*',
        ],
        'not_match' => [
            'native' => '!~',
        ],
        'not_imatch' => [
            'native' => '!~*',
        ],
        'same' => [
            'native' => '~~',
        ],
        'isame' => [
            'native' => '~~*',
        ],
        'not_same' => [
            'native' => '!~~',
        ],
        'not_isame' => [
            'native' => '!~~*',
        ],
        'in' => [
            'native' => 'in',
            'needs' => 'collection'
        ],
        'not_in' => [
            'native' => 'not in',
            'needs' => 'collection'
        ],
    ],

];
