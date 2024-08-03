<?php

namespace Src\View;

class View
{
	public static function make($path, $params)
	{
		foreach ($params as $param => $value) {
			$$param = $value;
		}

		include base_path() . 'views/' . $path . '.php';
	}
}