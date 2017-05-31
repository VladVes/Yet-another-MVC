<?php
namespace app\services;
use app\models\User;
use app\base\Application;

class Auth
{
	public static $isLogged = false;
	protected $sessionKey = 'sid';

	public function getSessionId() 
	{
		if (isset($_COOKIE['token'])) {
			$sid = $_COOKIE['token'];
		} elseif (isset($_SESSION[$this->sessionKey])) {
			$sid = $_SESSION[$this->sessionKey];
		} else {
			$sid = null;
		}

		if(!is_null($sid)){
			$sr = Application::call()->sessionrep;
			$sr->clearSession();
			$sr->updateLastTime($sid);

		} 
		return $sid;
	}
}