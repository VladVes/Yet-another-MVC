<?php
namespace app\models;
use app\services\Db;

class Model
{
	protected $tableName;

	abstract protected function getTableName();

	public function fetchOneById($id)
	{
		$table = $this->getTableName();
		$query = "SELECT * FROM $table WHERE id = :id";

		$result = \app\base\Application::call()->Db->fetchOne(['id' => $id]);

		return $result;
	}
	
}


?>