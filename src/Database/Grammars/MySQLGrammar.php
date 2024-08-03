<?php

namespace Src\Database\Grammars;

use App\Modles\Model;

class MySQLGrammar
{
	public static function buildInsertQuery($keys)
	{
		$columns = '';
		$placeholders = '';
		foreach ($keys as $key) {
			$columns .= $key . ', ';
			$placeholders .= '?, ';
		}
		$columns = rtrim($columns, ', ');
		$placeholders = rtrim($placeholders, ', ');

		return "INSERT INTO " . Model::getTableName() . " ({$columns}) VALUES ({$placeholders})";
	}

	public static function buildSelectQuery($columns, $filter)
	{
		$columnsStr = is_string($columns) ? $columns : '';
		if (is_array($columns)) {
			foreach ($columns as $column) {
				$columnsStr .= $column . ', ';
			}

			$columnsStr = rtrim($columnsStr, ', ');
		}

		$query = "SELECT {$columnsStr} FROM " . Model::getTableName();

		if ($filter)
			$query .= " WHERE {$filter[0]} {$filter[1]} ?";

		return $query;
	}

	public static function buildUpdateQuery($keys)
	{
		$columns = '';
		foreach ($keys as $key) {
			$columns .= $key . ' = ?, ';
		}
		$columns = rtrim($columns, ', ');

		return "UPDATE " . Model::getTableName() . " SET {$columns} WHERE id = ?";
	}

	public static function buildDeleteQuery()
	{
		return "DELETE FROM " . Model::getTableName() . " WHERE id = ?";
	}
}