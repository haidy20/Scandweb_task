<?php

use Src\Application;
use Src\View\View;

if (! function_exists('base_path')) {
	function base_path($path = '')
	{
		return __DIR__ . '/../../' . $path;
	}
}

if (! function_exists('env')) {
	function env($key, $default = null)
	{
		return $_ENV[$key] ?? $default;
	}
}

if (! function_exists('view')) {
	function view($path, $params = [])
	{
		View::make($path, $params);
	}
}

if (! function_exists('app')) {
	function app()
	{
		return Application::getInstance();
	}
}

if (! function_exists('redirect')) {
	function redirect($uri)
	{
		return header('Location: ' . $uri);
	}
}

if (! function_exists('dd')) {
	function dd($data)
	{
		dump($data);die();
	}
}

