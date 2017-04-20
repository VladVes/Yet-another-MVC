<?php

namespace app\services;

class RequestManager
{
	protected $request;
	protected $rules;
	protected $controller;
	protected $action;
	protected $params = [];

	public function __construct($rules)
	{
		$this->rules = $rules;
		$this->request = $_SERVER['REQUEST_URI'];
		Log::write($this->request . ' request recived');
		$this->parseRequest();
	}

	protected function parseRequest()
	{
		foreach ($this->rules as $rule => $ruleVal) {
			if(preg_match_all($ruleVal, $this->request, $matches)) {
				break;
			}
		}
		$this->controller = $matches['controller'][0];
		$this->action = $matches['action'][0];
		$this->params = array_merge(explode("/", $matches['params'][0]), $_REQUEST);
		
		echo "<pre>";
		var_dump($this->params);
		echo "<pre>";

		/*

		$paramStr = '';
		foreach ($this->params as $param => $val) {
			$paramStr .= $param . " = " . $val;
		}
		echo "<pre>";
		var_dump($paramStr);
		echo "<pre>";
		
		*/

		Log::write('request contains: controller - ' . $this->controller . '; action: '  . $this->action . '; parametrs: ' );

	}

	public function getControllerName() 
	{
		return $this->controller;
	}
	public function getActionName()
	{
		return $this->action;
	}
	public function getParams()
	{
		return $this->params;
	}
}


?>