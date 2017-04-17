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
		$this->test_request = '/mainController/mainAction/param234/param333/paramZXV';
		echo "<pre>";
		var_dump($rules);
		echo "</pre>";
		$this->parseRequest();
	}

	protected function parseRequest()
	{
		foreach ($this->rules as $rule => $ruleVal) {
			if(preg_match_all($ruleVal, $this->test_request, $matches)) {
				break;
			}
		}
		$this->controller = $matches['controller'][0];
		$this->action = $matches['action'][0];
		$this->params = array_merge((explode('/', $matches['params'][0]), $_REQUEST);

		var_dump($this->params);
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