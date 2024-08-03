<?php

namespace Src\Validation;

use Src\Validation\RuleMapper;

class RulesResolver
{
	public static function make($rules)
	{
		if (is_string($rules))
			$rules = explode('|', $rules);

		return array_map(function($rule) {
			if (is_string($rule))
				return self::getRuleFromString($rule);

			return $rule;
		}, $rules);
	}

	protected static function getRuleFromString(string $ruleStr)
	{
		$exploded = explode(':', $ruleStr);
		$ruleName = $exploded[0];
		$ruleAttrs = explode(',', end($exploded));
		return RulesMapper::resolve($ruleName, $ruleAttrs);
	}
}