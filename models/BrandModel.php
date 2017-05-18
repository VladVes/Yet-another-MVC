<?php
namespace app\models;
use app\services\Db;

class BrandModel extends Model
{
	protected $tableName = 'brand';

	protected function getTableName()
	{
		return $this->tableName;
	}

}


?>