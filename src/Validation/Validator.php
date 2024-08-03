<?php

namespace Src\Validation;

use Src\Validation\ErrorBag;
use Src\Validation\Message;
use Src\Validation\Resolver;
use Src\Validation\Rules\Contract\Rule;

class Validator
{
	protected array $rules = [];
	protected array $data = [];
	protected array $aliases = [];
	protected ErrorBag $errorBag;

	public function make(array $data, array $rules)
	{
		$this->data = $data;
		$this->rules = $rules;
		$this->errorBag = new ErrorBag;
		$this->validate();
	}

	protected function validate()
	{
		foreach ($this->rules as $field => $fieldRules) {
			foreach (RulesResolver::make($fieldRules) as $rule) {
				$noError = $this->applyRule($field, $rule);

				if (!$noError || $this->hasRequiredWithRuleAndIsIrrelevantField($rule))
					break;
			}
		}
	}

	protected function applyRule(string $field, Rule $rule)
	{
		if (! $rule->apply($field, $this->getFieldValue($field), $this->data)) {
			$this->errorBag->add($field, Message::generate($this->alias($field), $rule));

			return false;
		}

		return true;
	}

	protected function hasRequiredWithRuleAndIsIrrelevantField(Rule $rule)
	{
		$hasRequiredWithRule = str_contains(get_class($rule), 'RequiredWithRule');
		if ($hasRequiredWithRule) {
			// If a field has a requiredWith rule and the value of the other field doesn't match the provided value, then we shouldn't continue applying the other rules
			$isIrrelevantField = $this->data[$rule->secondField] != $rule->secondFieldValue;
			if ($isIrrelevantField)
				return true;
		}

		return false;
	}

	public function setAliases(array $aliases)
	{
		$this->aliases = $aliases;
	}

	public function alias(string $field)
	{
		return $this->aliases[$field] ?? $field;
	}

	public function passes()
	{
		return empty($this->errors());
	}

	public function errors(string $key = null)
	{
		return $key ? $this->errorBag->errors[$key] : $this->errorBag->errors;
	}

	protected function getFieldValue(string $field)
	{
		return $this->data[$field] ?? null;
	}
}