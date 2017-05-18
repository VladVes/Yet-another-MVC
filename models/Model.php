<?php
namespace app\models;
use app\services\Db;

abstract class Model
{
	protected $tableName;
	protected $forignKeys = [];

	abstract protected function getTableName();
	abstract protected function getForignKeys();

	public function fetchOneById($id)
	{
		$table = $this->getTableName();
		$query = "SELECT * FROM $table WHERE id = :id";

		$result = \app\base\Application::call()->db->fetchOne($query, [':id' => $id]);

		return $result;
	}

	public function forignIdToName($row)
	{
		$result = [];

		foreach($row as $key => $val) {
			foreach ($this->forignKeys as $fkey => $fval) {
				if($key === $fkey)	{
					$query = "SELECT $fval[] FROM $val WHERE id = :id";
				}
			}
		}

		$query = "SELECT $key FROM $val WHERE id = :id";
		$model = \app\base\Application::call()->factory->call()
		fetchOne($query, [':id' => $id])[0];
		}
	}
}


?>