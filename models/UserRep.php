<?php
namespace app\models;
use app\services\Db;

class UserRep
{
	private $conn = null;
	protected $nestedClass = 'app\models\User';

	public function __construct()
	{
		$this->conn = Db::getInstance();
	}

	public function getByLoginPass($login, $pass)
	{
		return $this->conn->fetchObject(
			sprintf(
				"SELECT u.* FROM user u WHERE login = '%s' AND password = '%s'", $login, md5($pass)), [], $this->nestedClass
			);
	}

	public function getById($id)
	{
		return $this->conn->fetchObject(
			"SELECT u.* FROM user u WHERE u.id = ?", [$id], $this->nestedClass
			);
	}
}


?>