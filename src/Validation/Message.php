<?php

namespace Src\Validation;

use Src\Validation\Rules\Contract\Rule;

class Message
{
	public static function generate(string $field, Rule $rule)
	{
		return str_replace('%s', $field, $rule);
	}
}