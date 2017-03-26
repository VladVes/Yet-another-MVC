<?php

namespace app\controllers;
use app\services\RenderFactory;
use app\interfaces\IFactory;
use app\interfaces\IRenderer;

abstract class Controller
{

	//для доступа будем передовать "С" и "A" в URL
	protected $action;
	protected $defaulAction = 'index';
	protected $renderer;
	protected $factory;

	public function __construct(IFactory $fact = null)
	{
		$this->factory = $fact;
		
		//$this->renderer = $rnd;
	}

	public function run($action = null) // запускает методы
	{

		$this->action = $action?:$this->defaulAction;
		$action = 'action' . ucfirst($this->action); //получаем имя метода
		$this->beforeAciton();
		$this->$action(); //запускаем полученный метод
		$this->afterAction();
	}

	public function render($template, $params = [])
	{

		$this->renderer = $this->factory->create();
		$this->renderer->render($template, $params);
	}

	public function beforeAciton()
	{

	}

	public function afterAction()
	{

	}

	public function redirect($url)
	{
		header("Location: /{$url}");
	}
}


?>
