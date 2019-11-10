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

use Rules;

class Type extends BaseElement
{
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
