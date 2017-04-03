<?php
namespace app\base;

class Application
{
	protected static $instance;
	protected $config;

	public static function call()
	{
		if(is_null(self::$instance)) {
			self::$instance = new static;
		}
		return self::$instance;
	}
	
	public function run() 
	{
		$this->config = include "../config/config.php";

		

	}

	protected function autoload()
	{
		require_once("../services/Autoload.php");
		require_once("../vendor/autoload.php");

		spl_autoload_register([new \app\services\Autoload(), 'uploadClass']);
	}


}


?>