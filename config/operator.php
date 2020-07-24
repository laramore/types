<?php

namespace Laramore\Elements;

return [

    /*
    |--------------------------------------------------------------------------
    | Operator manager
    |--------------------------------------------------------------------------
    |
    | This option defines the class that will manage all operators.
    |
    */

    'manager' => OperatorManager::class,

    /*
    |--------------------------------------------------------------------------
    | Default operators
    |--------------------------------------------------------------------------
    |
    | This option defines all default operators.
    | The operators must be defined as keys.
    | There are callable for example like this:
    | > whereNumberInfEq(10) to specify that the field `number` must be inferior or equal to 10.
    |
    | The value could be:
    | - a `native` string: it is the operator used in database,
    | - an array with:
    |   - a `native` string (by default it is set with the key value),
    |   - a `value_type` definition: force the value to be `null`, a `collection` or a `binary`.
    |
    */

    'configurations' =>  [
        'null' => [
            'value_type' => OperatorElement::NULL_VALUE,
        ],
        'not_null' => [
            'native' => 'not null',
            'value_type' => OperatorElement::NULL_VALUE,
        ],
        'doesnt_exist' => [
            'native' => 'null',
            'value_type' => OperatorElement::NULL_VALUE,
        ],
        'dont_exist' => [
            'native' => 'null',
            'value_type' => OperatorElement::NULL_VALUE,
        ],
        'exist' => [
            'native' => 'not null',
            'value_type' => OperatorElement::NULL_VALUE,
        ],
        'exists' => [
            'native' => 'not null',
            'value_type' => OperatorElement::NULL_VALUE,
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
        'inf_eq' => [
            'native' => '<=',
        ],
        'sup_eq' => [
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
        'different' => [
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
        'rlike' => [
            'native' => 'rlike',
        ],
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
            'value_type' => OperatorElement::BINARY_VALUE,
        ],
        'bitor' => [
            'native' => '|',
            'value_type' => OperatorElement::BINARY_VALUE,
        ],
        'bitxor' => [
            'native' => '^',
            'value_type' => OperatorElement::BINARY_VALUE,
        ],
        'bitleft' => [
            'native' => '<<',
            'value_type' => OperatorElement::BINARY_VALUE,
        ],
        'bitright' => [
            'native' => '>>',
            'value_type' => OperatorElement::BINARY_VALUE,
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
            'value_type' => OperatorElement::COLLECTION_VALUE,
        ],
        'not_in' => [
            'native' => 'not in',
            'value_type' => OperatorElement::COLLECTION_VALUE,
        ],
    ],

];
