<?php

namespace Src;

use Src\Database\DB;
use Src\Database\Managers\Contract\DatabaseManager;
use Src\Database\Managers\MySQLManager;
use Src\Http\Request;
use Src\Http\Response;
use Src\Http\Route;

class Application
{
	protected Request $request;
	protected Response $response;
	protected Route $route;
	public DB $db;
	protected DatabaseManager $dbManager;
	private static ?Application $instance = null;

	private function __construct()
	{
	}

	public static function getInstance()
	{
		if (static::$instance)
			return static::$instance;

		static::$instance = new static();
		static::$instance->request = new Request;
		static::$instance->response = new Response;
		static::$instance->route = new Route(static::$instance->request, static::$instance->response);
		static::$instance->db = new DB(static::$instance->getDatabaseManager());

		static::$instance->handleErrorReporting();

		return static::$instance;
	}

	public function run()
	{
		$this->db->init();
		$this->route->resolve();
	}

	public function request()
	{
		return $this->request;
	}

	protected function getDatabaseManager()
	{
		if ($this->getDatabaseDriver() == 'mysql')
			return new MySQLManager;
	}

	protected function getDatabaseDriver()
	{
		return env('DB_DRIVER');
	}

	protected function handleErrorReporting()
	{
		if (env('APP_ENV') == 'development') {
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
			$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
		}
	}

	private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new Exception("Cannot unserialize");
    }
}