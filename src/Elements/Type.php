<?php
/**
 * Define a specific field type element.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2019
 * @license MIT
 */

namespace Laramore\Elements;

use Laramore\Interfaces\IsConfigurable;
use Rules;

class Type extends BaseElement implements IsConfigurable
{
    /**
     * Return the configuration path for this field.
     *
     * @param string $path
     * @return mixed
     */
    public function getConfigPath(string $path=null)
    {
        return 'types.configurations.'.$this->getName().(\is_null($path) ? '' : '.'.$path);
    }

    /**
     * Return the configuration for this field.
     *
     * @param string $path
     * @param mixed  $default
     * @return mixed
     */
    public function getConfig(string $path=null, $default=null)
    {
        return config($this->getConfigPath($path), $default);
    }

    /**
     * Tell if a value is of the right type.
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isType($value): bool
    {
        $native = $this->get('native');

        if ($native instanceof \Closure) {
            return $native($value);
        }

        $type = "\is_$native";

        return $type($value);
    }

    /**
     * Define all rules to add if this rule is added.
     *
     * @param array $rules
     * @return self
     */
    public function setDefaultRules(array $rules)
    {
        $this->needsToBeUnlocked();

        $this->values['default_rules'] = \array_map(function ($rule) {
            return \is_string($rule) ? Rules::getOrCreate($rule) : $rule;
        }, $rules);

        return $this;
    }
}
