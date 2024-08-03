<?php

namespace Src\Validation;

class RulesMapper
{
	protected static array $map = [
		'required' => 'RequiredRule',
		'string' => 'StringRule',
		'numeric' => 'NumericRule',
		'alnum' => 'AlphanumericRule',
		'max' => 'MaxRule',
		'min' => 'MinRule',
		'unique' => 'UniqueRule',
		'in' => 'InRule',
		'requiredWith' => 'RequiredWithRule'
	];

	public static function resolve(string $name, array $attrs)
	{
		$ruleClassPath = "\\Src\\Validation\\Rules\\" . static::$map[$name];
		return new $ruleClassPath(...$attrs);
	}
}