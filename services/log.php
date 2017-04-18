<?php
namespace app\services;

class Log
{
	protected static $fileName = 'all';
	protected static $message;
	protected static $bytes;

	protected function prepareMessage($mess)
	{
		$m = date('Y-m-d H:i:s') . ' ' . $mess . "\r\n";
		return $m;
	}

	static public function write($mess)
	{
		$fName = self::$fileName;
		$fullName = "../Log/{$fName}.log";
				
		if ($res = fopen($fullName, "a+"))
		{
			self::$bytes = fwrite($res, self::prepareMessage($mess));
			fclose($res);
		} else return false;
	}

	public function getLogFileSize()
	{
		return $this->$bytes;
	}
}



?>