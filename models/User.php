<?php
namespace app\models;
use app\base\Application;

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
		session_start();
		
		$userId = $this->getUserId();
		if($userId) {
			return Application::call()->userrep->getById($userId);
		}
		return null;
	}

	public function getUserId()
	{
		$sid = Application::call()->auth->getSessionId();
		if(!is_null($sid)){
			return Application::call()->sessionrep->getUidBySid($sid);
		}
		return null;
	}

}
?>