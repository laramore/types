<?php
/**
 * Add rule management for fields.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2019
 * @license MIT
 */

namespace Laramore\Traits\Field;

use Laramore\Elements\Rule;
use Rules;

trait HasRules
{
    /**
     * All rules for this field.
     *
     * @var array
     */
    protected $rules = [];

    /**
     * Indicate if the resource has a rule.
     *
     * @param  string|Rule $rule
     * @return boolean
     */
    public function hasRule($rule)
    {
        return isset($this->rules[$rule instanceof Rule ? $rule->getName() : $rule]);
    }

    /**
     * Add a rule to the resource.
     *
     * @param string|Rule $rule
     * @return self
     */
    protected function addRule($rule)
    {
        $this->needsToBeUnlocked();

        if (\is_string($rule)) {
            $rule = Rules::get($rule);
        }

        if (!$this->hasRule($rule)) {
            $this->rules[$rule->getName()] = $rule;

            foreach ($rule->adds as $add) {
                $this->removeRule($add);
            }

            foreach ($rule->removes as $remove) {
                $this->removeRule($remove);
            }
        }

        return $this;
    }

    /**
     * Add multiple rules to the resource.
     *
     * @param array $rules
     * @return self
     */
    public function addRules(array $rules)
    {
        foreach ($rules as $rule) {
            $this->addRule($rule);
        }

        return $this;
    }

    /**
     * Remove a rule from the resource.
     *
     * @param  string|Rule $rule
     * @return self
     */
    protected function removeRule($rule)
    {
        $this->needsToBeUnlocked();

        if ($this->hasRule($rule)) {
            unset($this->rules[$rule instanceof Rule ? $rule->getName() : $rule]);
        }

        return $this;
    }

    /**
     * List all current rules for this resource.
     *
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }
}
