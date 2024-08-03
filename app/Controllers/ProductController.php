<?php

namespace App\Controllers;

use App\Modles\Product;
use Src\Validation\Validator;


class ProductController
{
	public function index()
	{
		$products = Product::all();
		return view('all-products', [
			'products' => $products
		]);
	}

	public function create()
	{
		return view('create-product');
	}

	public function store()
	{
		// Validation
		$requestData = app()->request()->only(['SKU', 'name', 'price', 'type', 'size', 'height', 'width', 'length', 'weight']);
		$rules = [
			'SKU' => 'required|string|unique:products,SKU|max:255',	
			'name' => 'required|string|max:255',
			'price' => 'required|numeric|min:1',
			'type' => 'required|string|in:' . implode(',', Product::TYPES),
			'size' => 'requiredWith:type,DVD|numeric',
			'height' => 'requiredWith:type,furniture|numeric',	
			'width' => 'requiredWith:type,furniture|numeric',	
			'length' => 'requiredWith:type,furniture|numeric',	
			'weight' => 'requiredWith:type,book|numeric',	
		];
		$validator = new Validator;
		$validator->make($requestData, $rules);

		// Handle errors
		if ($errors = $validator->errors()) {
			$errors = array_merge(...array_values($errors));

			return  view('create-product', ['errors' => $errors]);
		}

		// Create product
		$product = new Product;
		$product->setSKU($requestData['SKU']);
		$product->setName($requestData['name']);
		$product->setPrice($requestData['price']);
		$product->setType($requestData['type']);
		$product->setSize($requestData['size']);
		$product->setHeight($requestData['height']);
		$product->setWidth($requestData['width']);
		$product->setLength($requestData['length']);
		$product->setWeight($requestData['weight']);
		$product->save();

		return redirect('/');
	}

	public function destroy()
	{
		$product = new Product;
		$product->delete(app()->request()->get('delete-products'));

		return redirect('/');
	}
}