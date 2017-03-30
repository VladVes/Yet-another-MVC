<?php
namespace app\models;
use app\services\Db;

class SessionRep {

	private $conn = null;

	public function __construct()
	{
		$this->conn = Db::getInstance();
	}

	public function clearSession()
	{
		/*echo sprintf("DELETE FROM sessions WHERE last_update < '%s'", date('Y-m-d H:i:s', time())); */
		return Db::getInstance()->execute(
            sprintf("DELETE FROM sessions WHERE last_update < '%s'", date('Y-m-d H:i:s', time() - 60)) 
		);
	}

	public function deleteSession($sid)
	{
		/*echo sprintf("DELETE FROM sessions WHERE last_update < '%s'", date('Y-m-d H:i:s', time())); */
		return Db::getInstance()->execute(
            sprintf("DELETE FROM sessions WHERE sid = '%s'", $sid) 
		);
	}

	public function createNew($userId, $sid, $timeLast)
	{
		return Db::getInstance()->execute(
			"INSERT INTO sessions(user_id, sid, last_update) VALUES (?, ?, ?)", [$userId, $sid, $timeLast]
		);
	}

	public function updateLastTime($sid, $time = null)
    {
        if (is_null($time)) {
            $time = date('Y-m-d H:i:s');
        }
        return Db::getInstance()->execute(
            "UPDATE sessions SET last_update = '{$time}' WHERE sid = '{$sid}'");
    }

	public function getUidBySid($sid)
	{
		return Db::getInstance()->fetchOne(
			"SELECT user_id FROM sessions WHERE sid = ?", [$sid]
		)['user_id'];
	}
}

?>