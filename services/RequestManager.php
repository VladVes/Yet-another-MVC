<?php

namespace app\services;

class RequestManager
{
	protected $request;
	protected $rules;
	protected $controller;
	protected $action;
	protected $params = [];

	private $isRequest;

	public function __construct($rules)
	{
		$this->rules = $rules;
		$this->request = $_SERVER['REQUEST_URI'];
		Log::write($this->request . ' request recived');

		if($_SERVER['REQUEST_URI'] == '/' && isset($_SERVER['QUERY_STRING'])){
			$this->isRequest = true;
		} else $this->isRequest = false;

		$this->parseRequest();		
	}

	protected function parseRequest()
	{
		
		if(!$this->isRequest) {
			foreach ($this->rules as $rule => $ruleVal) {
				if(preg_match_all($ruleVal, $this->request, $matches)) {
					break;
				}
			}

			$this->controller = $matches['controller'][0];
			$this->action = $matches['action'][0];
			$this->params = array_merge(explode("/", $matches['params'][0]), $_REQUEST);
			
			$paramStr = '';
			foreach ($this->params as $param => $val) {
				$paramStr .= $param . " = " . $val;
			}
		} else {
			$paramStr = '';
			$this->controller = ($_REQUEST['controller']);
			$this->action = ($_REQUEST['action']);
		}
	
		Log::write("request contains: controller - " . $this->controller . "; action: "  . $this->action . " parametrs: $paramStr");
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