<?php
namespace app\base;

class Application
{
	protected static $instance;
	protected $config;
	protected $storage;


	public static function call()
	{
		if(is_null(self::$instance)) {
			self::$instance = new static;
		}
		return self::$instance;
	}
	
	public function run()
	{
		if(file_exists("../config/config.php"))
		{
			//echo "component mainController";
		
		}
		$this->config = include "../config/config.php";

		//var_dump($this->config);

		$this->autoload();
		$this->storage = new Container(); //хранилище компонентов (только хранит, но не создает)

		//var_dump($this->storage);

		$this->mainController->run();

		//var_dump($this->mainController);
	}

	protected function autoload()
	{
		require_once("../services/Autoload.php");
		require_once("../vendor/autoload.php");

		spl_autoload_register([new \app\services\Autoload(), 'uploadClass']);
	}
	public function createComponent($name) //по хорошему создание компонентов нужно выносить в отдельный класс
	{
		//echo $name;
		//var_dump($this->config);
		if(isset($this->config['components'][$name])) {
				//var_dump($this->config['components'][$name]);
			$params = $this->config['components'][$name];
				//var_dump($params);
			$class = $params['class'];
			unset($params['class']); //оставляем только нужные нам переменные - все кроме имя класса т.е. параметры 
			
			$reflection = new \ReflectionClass($class);
				//var_dump($reflection);  //reflection API Служит для получения информации о классе и различным манипуляциям
			
			$class = $reflection->newInstanceArgs($params); //используя рефлекшн класс на основе переданного класса вызываем констркутор рефлекшена и передаем туда все параметры
				//var_dump($class);
			return $class;
		}
	}
	public function __get($name) //создане и получение компонентов приложения
	{
		
		return $this->storage->get($name);
	}


}


?>