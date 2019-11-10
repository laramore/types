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
     * Create the operator with a specific name.
     *
     * @param string $name
     * @param string $native
     * @param string $need
     */
    public function __construct(string $name, string $native, string $need=null)
    {
        parent::__construct($name, $native);

        $this->set('need', $need);
    }

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
