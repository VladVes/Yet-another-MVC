<?php
namespace app\models;
use app\services\Db;

class ProductModel extends Model
{
	protected $tableName = 'product';
	protected $forignKeys = [
		'product_brand' => 
			['brand' => 'brand_name'],
		'product_type' =>
			['type' => 'type_name'],
		'product_category' => 
			['category' => 'category_name']
		];

	protected $id;
	protected $product_brand;
	protected $product_type;
	protected $product_price;
	protected $product_quantity;
	protected $product_discount;
	protected $product_category;
	protected $product_desctiption;

	protected function getTableName()
	{
		return $this->tableName;
	}

	protected function getForignKeys()
	{
		return $this->forignKeys;
	}

}


?>