<?php
namespace app\controllers;
use app\services\Log;

abstract class Controller
{
	protected $defaultAction = 'index';
	protected $action;
	protected $defaultRenderer = 'dr';
	protected $renderer;

	public function __construct($renderer = null)
	{
		$this->renderer = $renderer ?: $this->defaultRenderer;
		Log::write(get_called_class() . " controller and renderer {$this->renderer}");
	}

	public function run($action = null)
	{
		echo "<br> controller running controller!";
		
		$this->action = $action ?: $this->defaultAction;
		$action = 'action' . ucfirst($this->action);
		Log::write("running {$actionMethod}");

		$this->beforeAction();
		$this->$action();
		$this->afterAction();
	}

	protected function beforeAction() 
	{

	}

	protected function afterAction()
	{

	}

	public function render($template, $params = [])
	{
		//$renderer = $this->renderer;
		app\base\Application::call()->$this->renderer->run($template, $params);

	}

}
?>