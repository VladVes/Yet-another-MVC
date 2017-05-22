<?php
namespace app\models;
use app\services\Db;
use app\base\Application;

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
		return $this->forignIdsToNames(Application::call()->db->fetchOne($query, [':id' => $id]));
	}

	public function __get($prop)
	{
		return isset($this->$prop) ? $this->$prop : null;		
	}

	public function fetchAll()
	{
		$table = $this->getTableName();
		$query = "SELECT * FROM $table";
		$result = [];
		foreach (Application::call()->db->fetchAll($query) as $val) {
			$result[] = $this->forignIdsToNames($val);
		}
		return $result;
	}

	protected function forignIdsToNames($row)
	{
		//$namedRow = [];
		foreach($row as $key => $val) {
			foreach ($this->forignKeys as $fkey => $fval) {

				if($key === $fkey)	{
					$table = implode('', array_keys($fval));
					$column = implode('', array_values($fval));
					$query = "SELECT $column FROM $table WHERE id = :id";				
					$row[$key] = Application::call()->db->fetchOne($query, ['id' => $val])[$column];
				}
			}
		}
		//return array_merge($row, $namedRow);
		return $row;

	}
}


?>