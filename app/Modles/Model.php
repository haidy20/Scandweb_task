<?php

namespace App\Modles;

abstract class Model
{
	protected static $instance;
	protected static $table;
	protected ?int $id = null;

	public function setID($value)
	{
		$this->id = $value;
	}

	public function getID()
	{
		return $this->id;
	}

	public function save()
	{
		if ($this->id && self::get($this->id))
			self::update($this->getData());
		else
			self::create($this->getData());
	}

	public static function create(array $data)
	{
		self::$instance = static::class;

		return app()->db->create($data);
	}

	public static function get($id)
	{
		self::$instance = static::class;

		return app()->db->read("*", ['id', '=', $id]);
	}

	public static function all()
	{
		self::$instance = static::class;

		return app()->db->read();
	}

	public static function where($filter, $columns = "*")
	{
		self::$instance = static::class;

		return app()->db->read($columns, $filter);
	}

	public function update(array $data)
	{
		self::$instance = static::class;

		return app()->db->update($this->id, $data);
	}

	public function delete(array $ids = [])
	{
		self::$instance = static::class;

		if ($ids) {
			foreach ($ids as $id) {
				app()->db->delete($id);
			}
		} else {
			app()->db->delete($this->id);
		}
	}

	public static function getTableName()
	{
		return self::$instance::$table;
	}
}