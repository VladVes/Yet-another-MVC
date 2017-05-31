<?php

namespace app\model;

class UserRep
{
	protected $user;
	protected $db;

	public function __construct() 
	{
		$this->db = \app\base\Application::call()->db;
	}
	
	public function getById($id)
	{
		return $this->conn->fetchObject(
			"SELECT u.* FROM user u WHERE u.id = ?", [$id], $this->nestedClass
			);
	}	


}

?>