<?php
namespace app\models;
use app\services\Db;

class ProductModel extends Model
{
	protected $tableName = 'product';

	protected function getTableName()
	{
		return $this->tableName;
	}

}


?>