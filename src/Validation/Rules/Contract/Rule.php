<?php

namespace Src\Validation\Rules\Contract;

interface Rule
{
	public function apply(string $field, $value, array $data);

	public function __toString();
}