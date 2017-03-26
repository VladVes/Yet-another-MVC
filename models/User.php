<?php
namespace app\models;

class User
{
	protected $id;
	protected $login;
	protected $password;
	protected $email;
	protected $sessionId;

	public function getId()
	{
		return $this->id;
	}

	public function getCurrent()
	{
		return false;
	}
}
?>