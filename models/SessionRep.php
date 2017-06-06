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
	public function createNew($userId, $sid, $timeLast)
	{
		return Application::call()->db->execute(
			"INSERT INTO sessions(user_id, sid, last_update) VALUES (?, ?, ?)", [$userId, $sid, $timeLast]
		);
	}

}