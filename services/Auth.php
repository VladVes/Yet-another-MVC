<?php
namespace app\services;
use app\models\UserRep;
use app\models\SessionRep;
use app\models\User;

class Auth
{
	protected $sessionKey = 'sid';

	public function login($login, $password)
	{
		$user = (new UserRep())->getByLoginPass($login, $password);
		if (!$user) {
			return false;
		} 
		return $this->openSession($user);
	}

	public function getSessionId() 
	{
		$sid = $_SESSION[$this->sessionKey];
		if(!is_null($sid)){
			(new SessionRep())->updateLastTime($sid);
		}
		return $sid;
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