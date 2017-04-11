<?php
namespace app\base;

use app\services\ClassAutoloader;

class Application
{
	protected static $instance = null;

	public function call()
	{
		if (is_null(static::$instance)) {
			static::$instance = new static;
			return static::$instance;
		}else return static::$instance;
	}

	public function run()
	{
		echo "running Application...";

		echo "<br>Done!";
	}

	protected function autoload()
	{
		(new ClassAutoloader())->loadClass();
	}
}
?>