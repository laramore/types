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

class Operator extends BaseElement
{
    /**
     * Return the element native value.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->get('native');
    }
}
