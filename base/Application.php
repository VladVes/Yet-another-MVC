<?php
namespace app\base;
use app\services\Log;

class Application
{
	protected static $instance = null;
	protected $configName = "../config/main.cfg";
	protected $config;
	protected $storage;

	public static function call()
	{
		if (is_null(self::$instance)) {
			self::$instance = new static;
		}
		return self::$instance;
	}

	public function run()
	{

		//echo "running Application...";
		
		$this->autoload();
		$this->storage = new \app\services\Container();

		Log::write("running Application...");

		if(file_exists($this->configName)) {
			$this->config = require_once $this->configName;
			Log::write("{$this->configName} included");
		} else Log::write("ERR: {$this->configName} file not found");

		Log::write("Done!");

		$this->main_controller->run();
		
		Log::write("Application terminate");
	}

	protected function autoload()
	{	
		require_once "../services/ClassAutoLoad.php";
		spl_autoload_register([new \app\services\ClassAutoLoad(), 'autoLoad']);
	}

	public function createComponent($name) 
	{
		if (isset($this->config['component'][$name])) {
			$params = $this->config['component'][$name];
			$class = $params['class'];
			unset($params['class']);

			$reflection = new \ReflectionClass($class);
			$newComponent = $reflection->newInstanceArgs($params);

			Log::write("$name componet has been created successfully");
			return $newComponent;

		} else {
			Log::write("ERR: can\'t create undefined component $name check configuration");
		}
	}

	public function __get($name)
	{
		return $this->storage->getComponent($name);
	}
}
?>