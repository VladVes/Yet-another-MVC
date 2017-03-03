<?php
namespace app\services;

class RequestManeger
{
	protected $requestString;
	protected $controllerName;
	protected $actionName;
	protected $params;

	protected $rules = [
		'#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?(?P<params>.*)#u' //регулярка с плейсхолдерами
	];

	public function __construct()
	{
		$this->parsRequest();
	}

	public function parsRequest()
	{
		$this->requestString = $_SERVER['REQUEST_URI'];
		
		foreach ($this->rules as $rule){
			if (preg_match_all($rule, $this->requestString, $matches)) //помещает в matches все найденные вхождения создавая при это массив из ассоциативных массивов блогодарая использованию плейсхолдеров ?P<> в регулярке
				var_dump($matches);
				$this->controllerName = $matches['controller'][0];
				$this->actionName = $matches['action'][0];
				$this->params = array_merge(explode("/", $matches['params'][0]), $_REQUEST); //массив из строки по разделителю /

				break;
		}
		


		/*
		$result = explode("/", $this->requestString);

		$this->controllerName = $result[1]; //нужно учитывать настрокйку htaccess ! 
		$this->actionName = $result[2];
		var_dump($result);
		var_dump($this);
		*/
	}

	/*

	public function getControllerName()
	{
		if (isset($_REQUEST['c'])) {
	
			$this->controllerName = $_REQUEST['c'];
		} else $this->controllerName = null;

		return $this->controllerName;
	}

	public function getActonName()
	{
		if (isset($_REQUEST['a'])) {
			$actionName = $_REQUEST['a'];
		} else $actionName = "";

		return $this->actionName;

	}

	*/

	public function getRequestString()
	{
		return $this->requestString;
	}

	public function getControllerName()
	{
		return $this->controllerName;	
	}

	public function getActionName()
	{
		return $this->actionName;
	}

	public function getParams()
	{
		return $this->params;
	}
}


?>