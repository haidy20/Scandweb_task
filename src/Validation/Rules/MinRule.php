<?php

namespace Src\Validation\Rules;

use Src\Validation\Rules\Contract\Rule;

class MinRule implements Rule
{
	protected $min;
	protected $value;

	public function __construct(int $min)
	{
		$this->min = $min;
	}

	public function apply(string $field, $value, array $data)
	{
		$this->value = $value;
		if (is_numeric($value))
			return $value >= $this->min;
		else if (is_string($value))
			return strlen($value) >= $this->min;
	}

	public function __toString()
	{
		return 'The %s field must be greater than or equal to ' . $this->min . (is_numeric($this->value) ? '' : ' characters.');
	}
}