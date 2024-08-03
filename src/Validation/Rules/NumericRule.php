<?php

namespace Src\Validation\Rules;

use Src\Validation\Rules\Contract\Rule;

class NumericRule implements Rule
{
	public function apply(string $field, $value, array $data)
	{
		return is_numeric($value);
	}

	public function __toString()
	{
		return 'The %s field must be a number.';
	}
}