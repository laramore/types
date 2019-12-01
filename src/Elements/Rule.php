<?php
/**
 * Define a specific field rule element.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2019
 * @license MIT
 */

namespace Laramore\Elements;

use Laramore\Facades\Rules;

class Rule extends Element
{
    /**
     * Define all rules to add if this rule is added.
     *
     * @param array $rules
     * @return self
     */
    public function setAdds(array $rules)
    {
        $this->needsToBeUnlocked();

        $this->values['adds'] = \array_map(function ($rule) {
            if (\is_string($rule)) {
                return Rules::has($rule) ? Rules::get($rule) : Rules::create($rule);
            } else {
                return $rule;
            }
        }, $rules);

        return $this;
    }

    /**
     * Define all rules to remove if this rule is added.
     *
     * @param array $rules
     * @return self
     */
    public function setRemoves(array $rules)
    {
        $this->needsToBeUnlocked();

        $this->values['removes'] = \array_map(function ($rule) {
            if (\is_string($rule)) {
                return Rules::has($rule) ? Rules::get($rule) : Rules::create($rule);
            } else {
                return $rule;
            }
        }, $rules);

        return $this;
    }
}
