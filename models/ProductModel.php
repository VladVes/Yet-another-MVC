<?php
namespace app\models;
use app\services\Db;

class ProducModel extends Model
{
	
	private $tableName = 'product';

	protected function getTableName()
	{
		return $this->tableName;
	}

}


?>