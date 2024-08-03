<?php

namespace Src\Http;

class Request
{
	public function all()
	{
		return $_REQUEST;
	}

	public function get(string $field)
	{
		return $_REQUEST[$field];
	}

	public function only(array $fields)
	{
		$data = [];
		foreach ($fields as $field) {
			$data[$field] = $_REQUEST[$field];
		}

		return $data;
	}

	public function getMethod()
	{
		return strtolower($_SERVER['REQUEST_METHOD']);
	}

	public function getPath()
	{
		return $_SERVER['REQUEST_URI'] ?? "/";
	}
}