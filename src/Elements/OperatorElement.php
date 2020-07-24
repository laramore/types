<?php
/**
 * Define an operator for SQL operations.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2019
 * @license MIT
 */

namespace Laramore\Elements;

use Illuminate\Support\Str;

class OperatorElement extends Element
{
    const COLLECTION_VALUE = 'collection';
    const NULL_VALUE = 'null';
    const BINARY_VALUE = 'binary';

    /**
     * Return where method.
     *
     * @return string
     */
    public function getWhereMethod(): string
    {
        return Str::studly($this->get('name'));
    }

    /**
     * Indicate if it is needs the right value type.
     *
     * @param string $valueType
     * @return boolean
     */
    public function needs(string $valueType): bool
    {
        return $this->get('value_type') === $valueType;
    }
}
