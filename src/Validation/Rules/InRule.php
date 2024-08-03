<?php

namespace Src\Validation\Rules;

use Src\Validation\Rules\Contract\Rule;

class InRule implements Rule
{
	protected array $values;

	public function __construct(...$values)
	{
		$this->values = $values;
	}

	public function apply(string $field, $value, array $data)
	{
		return in_array($value, $this->values);
	}

	public function __toString()
	{
		return "The value of %s field must be one of the following " . implode(', ', $this->values);
	}
}