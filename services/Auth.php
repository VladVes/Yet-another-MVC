<?php
namespace app\services;
use app\models\UserRep;
use app\models\SessionRep;
use app\models\User;

class Auth
{
	public static $isLogged = false;
	protected $sessionKey = 'sid';

	public function login($login, $password, $rem)
	{
		$user = (new UserRep())->getByLoginPass($login, $password);
		if (!$user) {
			return false;
		} elseif ($this->openSession($user)) {
			self::$isLogged = true;
		 	if ($rem) {
		 		(new Cookie())->createCookie("token", $_SESSION[$this->sessionKey], time() + 3600 * 24 * 7 );
		 	}
		 	return true;
		 } 
	}

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
			(new SessionRep())->updateLastTime($sid);
		} 
		return $sid;
		
	}

	public function unsetCookie()
	{
		(new Cookie())->clearCookie('token', $_SESSION[$this->sessionKey]);
	}


	public function closeSession()
		{
			unset($_SESSION[$this->sessionKey]);
			session_destroy();
		}


	protected function openSession(User $user) {
		$model = new SessionRep();
		$sid = $this->generateStr();
		$model->createNew($user->getId(), $sid, date("Y-m-d H:i:s"));
		$_SESSION[$this->sessionKey] = $sid;
		return true;
	}

	private function generateStr($length = 10){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;

        while (strlen($code) < $length)
            $code .= $chars[mt_rand(0, $clen)];

        return $code;
	}
}

?>