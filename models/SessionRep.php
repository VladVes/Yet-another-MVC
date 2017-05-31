<?php
namespace app\models;
use app\services\Db;
use app\base\Application;

class SessionRep {
	private $conn = null;

	
	public function getUidBySid($sid)
	{
		return Application::call()->db->fetchOne(
			"SELECT user_id FROM sessions WHERE sid = ?", [$sid]
		)['user_id'];
	}

}