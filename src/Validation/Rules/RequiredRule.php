<?php

namespace Src\Validation\Rules;

use Src\Validation\Rules\Contract\Rule;

class RequiredRule implements Rule
{
	public function apply(string $field, $value, array $data)
	{
		return is_numeric($value) ? true : !empty($value);
	}

	public function __toString()
	{
		return 'The %s field is required.';
	}
}