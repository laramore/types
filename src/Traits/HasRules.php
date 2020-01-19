<?php
/**
 * Add rule management.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2019
 * @license MIT
 */

namespace Laramore\Traits;

use Laramore\Elements\RuleElement;
use Laramore\Facades\Rule;

trait HasRules
{
    /**
     * All rules defined for the object.
     *
     * @var array
     */
    protected $rules = [];

    /**
     * Indicate if the resource has a rule.
     *
     * @param  string|RuleElement $rule
     * @return boolean
     */
    public function hasRule($rule)
    {
        return isset($this->rules[$rule instanceof RuleElement ? $rule->getName() : $rule]);
    }

    /**
     * Add a rule to the resource.
     *
     * @param string|RuleElement $rule
     * @return self
     */
    protected function addRule($rule)
    {
        $this->needsToBeUnlocked();

        if (\is_string($rule)) {
            $rule = Rule::get($rule);
        }

        if (!$this->hasRule($rule)) {
            $this->rules[$rule->getName()] = $rule;

            foreach ($rule->adds as $add) {
                $this->addRule($add);
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
     * @param  string|RuleElement $rule
     * @return self
     */
    protected function removeRule($rule)
    {
        $this->needsToBeUnlocked();

        if ($this->hasRule($rule)) {
            unset($this->rules[$rule instanceof RuleElement ? $rule->getName() : $rule]);
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
