<?php

namespace Src\Validation\Rules;

use Src\Validation\Rules\Contract\Rule;

class UniqueRule implements Rule
{
	protected string $table;
	protected string $column;

	public function __construct(string $table, string $column)
	{
		$this->table = $table;
		$this->column = $column;
	}

	public function apply(string $field, $value, array $data)
	{
		return !app()->db->raw("SELECT * FROM {$this->table} WHERE {$this->column} = ?", [$value]);
	}

	public function __toString()
	{
		return "The value of %s is already taken. Please, provide a different value.";
	}
}