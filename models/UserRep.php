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

	


}

?>