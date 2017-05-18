<?php
namespace app\models;
use app\services\Db;

class TypeModel extends Model
{
	protected $tableName = 'type';

	protected function getTableName()
	{
		return $this->tableName;
	}
}


?>