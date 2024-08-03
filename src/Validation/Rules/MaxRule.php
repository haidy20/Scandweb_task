<?php

namespace Src\Validation\Rules;

use Src\Validation\Rules\Contract\Rule;

class MaxRule implements Rule
{
	protected $max;
	protected $value;

	public function __construct(int $max)
	{
		$this->max = $max;
	}

	public function apply(string $field, $value, array $data)
	{
		$this->value = $value;
		if (is_numeric($value))
			return $value <= $this->max;
		else if (is_string($value))
			return strlen($value) <= $this->max;
	}

	public function __toString()
	{
		return 'The %s field must be less than or equal to ' . $this->max . (is_numeric($this->value) ? '' : ' characters.');
	}
}