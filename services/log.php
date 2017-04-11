<?php
namespace app\services;

class Log
{
	protected $fileName = 'all';
	protected $message;

	public function writeLog($mess)
	{
		$fullName = "../log/{$fileName}.log";
		
		if (is_writable($fullName)) {
			if ($res = fopen($fullName, "a+"))
			{
				
			}
		} else return false;



	}
}

?>