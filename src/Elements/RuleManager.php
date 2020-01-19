<?php
/**
 * Define a field rule manager used by Laramore.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2019
 * @license MIT
 */

namespace Laramore\Elements;

use Laramore\Interfaces\IsALaramoreManager;

class RuleManager extends ElementManager implements IsALaramoreManager
{
    protected $elementClass = RuleElement::class;
}
