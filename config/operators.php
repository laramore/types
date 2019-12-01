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
        'equal' => '=',
        'eq' => '=',
        'inf' => '<',
        'sup' => '>',
        'inf_or_eq' => '<=',
        'sup_or_eq' => '>=',
        'safe_not_equal' => '<>',
        'not_eq' => '!=',
        'not_equal' => '!=',
        'safe_equal' => '<=>',
        'like' => 'like',
        'like_binary' => 'like binary',
        'not_nike' => 'not like',
        'ilike' => 'ilike',
        'not_ilike' => 'not ilike',
        'rlike', 'rlike',
        'regexp' => 'regexp',
        'not_regexp' => 'not regexp',
        'similar_to' => 'similar to',
        'not_timilar_to' => 'not similar to',
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
        'match' => '~',
        'imatch' => '~*',
        'not_match' => '!~',
        'not_imatch' => '!~*',
        'same' => '~~',
        'isame' => '~~*',
        'not_same' => '!~~',
        'not_isame' => '!~~*',
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
