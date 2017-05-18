<?php
namespace app\models;
use app\services\Db;

class CategoryModel extends Model
{
	protected $tableName = 'category';

	protected function getTableName()
	{
		return $this->tableName;
	}

}


?>