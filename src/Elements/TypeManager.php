<?php
/**
 * Define a field type manager used by Laramore.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2019
 * @license MIT
 */

namespace Laramore\Elements;

use Laramore\Interfaces\IsALaramoreManager;

class TypeManager extends ElementManager implements IsALaramoreManager
{
    protected $elementClass = TypeElement::class;
}
