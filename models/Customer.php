<?php
namespace app\models;

class Customer extends Model
{
	protected static $tableName = "customer";

	public static function getTableName()
	{
		return self::$tableName;
	}
}

?>