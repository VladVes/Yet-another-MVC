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