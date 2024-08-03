<?php

namespace Src\Database\Managers;

use Src\Database\Grammars\MySQLGrammar;
use Src\Database\Managers\Contract\DatabaseManager;

class MySQLManager implements DatabaseManager
{
	protected static $instance;

	public function connect(): \PDO
	{
		if (!self::$instance)
			self::$instance = new \PDO(env('DB_DRIVER') . ":host=" . env('DB_HOST') . ';dbname=' . env('DB_DATABASE'), env('DB_USERNAME'), env('DB_PASSWORD'));

		return self::$instance;
	}

	public function query(string $query, $values = [])
	{
		$stmt = self::$instance->prepare($query);

		foreach ($values as $index => $value) {
			$stmt->bindValue($index+1, $value);
		}

		$stmt->execute($values);

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function create($data)
	{
		$query = MySQLGrammar::buildInsertQuery(array_keys($data));

		return $this->query($query, array_values($data));
	}

	public function read($columns = "*", $filter = null)
	{
		$query = MySQLGrammar::buildSelectQuery($columns, $filter);
		$values = $filter ? [$filter[2]] : [];

		return $this->query($query, $values);
	}

	public function update($id, $data)
	{
		$query = MySQLGrammar::buildUpdateQuery(array_keys($data));
		$values = array_merge(array_values($data), [$id]);

		return $this->query($query, $values);
	}

	public function delete($id)
	{
		$query = MySQLGrammar::buildDeleteQuery();

		return $this->query($query, [$id]);
	}
}