<?php
/**
 * Define an operator manager used for SQL operations.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2019
 * @license MIT
 */

namespace Laramore\Elements;

use Laramore\Interfaces\IsALaramoreManager;

class OperatorManager extends ElementManager implements IsALaramoreManager
{
    protected $elementClass = Operator::class;
}
