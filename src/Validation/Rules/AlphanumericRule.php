<?php

namespace Src\Validation\Rules;

use Src\Validation\Rules\Contract\Rule;

class AlphanumericRule implements Rule
{
	public function apply(string $field, $value, array $data)
	{
		return ctype_alnum($value);
	}

	public function __toString()
	{
		return 'The %s field must contain letters and numbers only.';
	}
}