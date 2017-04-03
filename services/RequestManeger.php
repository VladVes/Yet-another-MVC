<?php
namespace app\services;

class RequestManeger
{
	protected $requestString;
	protected $controllerName;
	protected $actionName;
	protected $params;
	const DEFAULT_CONTROLLER = 'product';

	protected $rules = [];
		 //регулярка с плейсхолдерами
		
		/*
		# - ограничение регулярки - #u
		(\w+) - '\w' одни буквенный симвло или '+' больше
		[/] - [ ]набор символов состоящий из одного /
		(.*) - '.' любой символ '*' в любом количестве
		() - нужны для разбиения результата поиска/вхождения
		? - значит предыдущий символ или группа() может быть а может и не быть
		?P<> - плейсхолдеры - позволяют создать АССОЦИАтивный массив, ключами которого будут являтся, а их значениями будут следующие за ними вхождения соответствующие выражению
		 */


		// /controller/action/parame1/param2 ../paramN
	];

	public function __construct($rules)
	{
		$this->rules = $rules;
		$this->parsRequest();
	}

	public function parsRequest()
	{
		$this->requestString = $_SERVER['REQUEST_URI'];
		//echo '<br>------------var_dump($this->requestString)------------<br>';
		//var_dump($this->requestString);
		if (substr(($this->requestString),1)) {
			foreach ($this->rules as $rule){
				if (preg_match_all($rule, $this->requestString, $matches)) // preg_match используется для поиска по регуляронму выражению,  помещает в matches все найденные вхождения создавая при этом массив дополненный ассоциативными ключами плейсхолдеров ?P<> в которых будут лежать индексные массивы - т.е. как бы дублируют ключи индекснего массива еще и ассоциативными ключами
					//echo '<br>------------var_dump($matches)------------<br>';
					//var_dump($matches);

					$this->controllerName = $matches['controller'][0];

					$this->actionName = $matches['action'][0];

					$this->params = array_merge(explode("/", $matches['params'][0]), $_REQUEST); 

					/*
					array_merge - объединяет массивы позволяет получать get запросы

					explode - разбивает строку по разделителю, полученные подстроки помещает в массив

				*/

					/*echo '<br>-----------------var_dump($this->params)------------<br>';
					var_dump($this->params);
					echo '<br>-----------------var_dump($_REQUEST)------------<br>';
					var_dump($_REQUEST); */

					
			} 

				//break;
		} else {
			$this->controllerName = self::DEFAULT_CONTROLLER;
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