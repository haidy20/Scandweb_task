<?php

namespace App\Modles;

use App\Modles\Model;

class Product extends Model
{
	protected static $table = 'products';
	protected string $SKU;
	protected string $name;
	protected float $price;
	protected string $type;
	protected float $size;
	protected float $height;
	protected float $width;
	protected float $length;
	protected float $weight;

	public const TYPES = ['DVD', 'furniture', 'book'];

	public function getData()
	{
		return [
			'SKU' => $this->SKU,
			'name' => $this->name,
			'price' => $this->price,
			'type' => $this->type,
			'size' => $this->size,
			'height' => $this->height,
			'width' => $this->width,
			'length' => $this->length,
			'weight' => $this->weight
		];
	}

	public function setSKU($value)
	{
		$this->SKU = $value;
	}

	public function getSKU()
	{
		return $this->SKU;
	}

	public function setName($value)
	{
		$this->name = $value;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setPrice($value)
	{
		$this->price = (float) $value;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function setType($value)
	{
		$this->type = $value;
	}

	public function getType()
	{
		return $this->type;
	}

	public function setSize($value)
	{
		$this->size = (float) $value;
	}

	public function getSize()
	{
		return $this->size;
	}

	public function setHeight($value)
	{
		$this->height = (float) $value;
	}

	public function getHeight()
	{
		return $this->height;
	}

	public function setWidth($value)
	{
		$this->width = (float) $value;
	}

	public function getWidth()
	{
		return $this->width;
	}

	public function setLength($value)
	{
		$this->length = (float) $value;
	}

	public function getLength()
	{
		return $this->length;
	}

	public function setWeight($value)
	{
		$this->weight = (float) $value;
	}

	public function getWeight()
	{
		return $this->weight;
	}
}