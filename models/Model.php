<?php

namespace app\models;
use app\services\Db;
use app\base\Application;

abstract class Model
{
	abstract public static function getTableName();

	public static function getById($id){
		$table = static::getTableName();

		$sql = "SELECT * FROM {$table} WHERE id = :id";
		$res = Application::call()->db->fetchObject($sql, [":id" => $id], get_called_class());
		return $res;
	}

	public static function getByIdFetchAll($id){
		$table = static::getTableName();

		$sql = "SELECT * FROM {$table} WHERE id = :id";
		$res = Application::call()->db->fetchOne($sql, [":id" => $id]);
		return $res;
	}

	public static function getAll(){
		$table = static::getTableName();
		$sql = "SELECT * FROM {$table}";
		return Application::call()->db->fetchAll($sql);
	}


}

?>