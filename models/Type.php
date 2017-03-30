<?php
namespace app\models;

class Type extends Model
{
	protected static $tableName = "type";

	public static function getTableName()
	{
		return self::$tableName;
	}
}

?>