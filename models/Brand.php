<?php
namespace app\models;

class Brand extends Model
{
	protected static $tableName = "brand";

	public static function getTableName()
	{
		return self::$tableName;
	}
}

?>