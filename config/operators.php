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
        'isNull' => [
            'native' => 'null',
            'needs' => 'null',
        ],
        'notNull' => [
            'needs' => 'null',
        ],
        'isNotNull' => [
            'native' => 'not null',
            'needs' => 'null',
        ],
        'doesntExist' => [
            'native' => 'null',
            'needs' => 'null',
        ],
        'dontExist' => [
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
        'inf' => '<',
        'sup' => '>',
        'infOrEq' => '<=',
        'supOrEq' => '>=',
        'safeNotEqual' => '<>',
        'notEqual' => '!=',
        'safeEqual' => '<=>',
        'like' => 'like',
        'likeBinary' => 'like binary',
        'notLike' => 'not like',
        'ilike' => 'ilike',
        'notIlike' => 'not ilike',
        'rlike', 'rlike',
        'regexp' => 'regexp',
        'notRegexp' => 'not regexp',
        'similarTo' => 'similar to',
        'notSimilarTo' => 'not similar to',
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
        'notMatch' => '!~',
        'notImatch' => '!~*',
        'same' => '~~',
        'isame' => '~~*',
        'notSame' => '!~~',
        'notIsame' => '!~~*',
        'in' => [
            'native' => 'in',
            'needs' => 'collection'
        ],
        'notIn' => [
            'native' => 'not in',
            'needs' => 'collection'
        ],
    ],

];
