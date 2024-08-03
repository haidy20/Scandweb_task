<?php

namespace Src\Http;

class Route
{
	protected static array $routes = [];
	public Request $request;
	public Response $response;

	public function __construct(Request $request, Response $response)
	{
		$this->request = $request;
		$this->response = $response;
	}

	public static function get($uri, $action)
	{
		self::$routes['get'][$uri] = $action;
	}
	
	public static function post($uri, $action)
	{
		self::$routes['post'][$uri] = $action;
	}

	public function resolve()
	{
		$method = $this->request->getMethod();
		$path = $this->request->getPath();
		$action = self::$routes[$method][$path] ?? false;

		if (! $action) {
			return view('404');
		}

		if (is_callable($action) && !is_array($action)) {
			$action();
		} else {
			call_user_func([new $action[0], $action[1]]);
		}
	}
}