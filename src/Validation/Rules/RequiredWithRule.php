<?php

namespace Src\Validation\Rules;

use Src\Validation\Rules\Contract\Rule;

class RequiredWithRule implements Rule
{
	public string $secondField;
	public string $secondFieldValue;

	public function __construct(string $secondField, string $secondFieldValue)
	{
		$this->secondField = $secondField;
		$this->secondFieldValue = $secondFieldValue;
	}

	public function apply(string $field, $value, array $data)
	{
		return $data[$this->secondField] != $this->secondFieldValue || (is_numeric($value) ? true : !empty($value));
	}

	public function __toString()
	{
		return 'The %s field is required when the ' . $this->secondField . ' field is ' . ' equal to "' . $this->secondFieldValue . '"';
	}
}