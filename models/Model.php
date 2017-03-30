<?php

namespace app\models;
use app\services\Db;

abstract class Model
{
	abstract public static function getTableName();

	public static function getById($id){
		$table = static::getTableName();

		$sql = "SELECT * FROM {$table} WHERE id = :id";
		//$res = Db::getInstance()->fetchOne($sql, [":id" => $id]);
		$res = Db::getInstance()->fetchObject($sql, [":id" => $id], get_called_class());
		return $res;
	}

	public static function getByIdFetchAll($id){
		$table = static::getTableName();

		$sql = "SELECT * FROM {$table} WHERE id = :id";
		$res = Db::getInstance()->fetchOne($sql, [":id" => $id]);
		return $res;
	}

	public static function getAll(){
		$table = static::getTableName();
		$sql = "SELECT * FROM {$table}";
		return Db::getInstance()->fetchAll($sql);
	}


}

?>