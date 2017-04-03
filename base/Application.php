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
		$this->config = include "../config/config.php";
		$this->autoload();
		$this->storage = new Container(); //хранилище компонентов (только хранит, но не создает)
		$this->mainController->run();
	}

	protected function autoload()
	{
		require_once("../services/Autoload.php");
		require_once("../vendor/autoload.php");

		spl_autoload_register([new \app\services\Autoload(), 'uploadClass']);
	}

	public function createComponent($name) //по хорошему создание компонентов нужно выносить в отдельный класс
	{
		if(isset($this->config['components'][$name])) {
			$params = $this->config['components'][$name];
			$class = $params['class'];
			unset($params['class']); //оставляем только нужные нам переменные - все кроме имя класса т.е. параметры 
			
			$reflection = new \ReflectionClass($class);  //reflection API Служит для получения информации о классе и различным манипуляциям
			return $reflection->newInstanceArgs($params); //используя рефлекшн класс на основе переданного класса вызываем констркутор рефлекшена и передаем туда все параметры
		}
	}


	public function __get($name) //создане и получение компонентов приложения
	{
		return $this->storage->get($name);
	}


}


?>