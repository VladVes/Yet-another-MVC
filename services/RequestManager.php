<?php

namespace app\services;

class RequestManager
{
	protected $request;
	protected $rules;

	public function __construct($rules)
	{
		$this->rules = $rules;
		$this->request = $_SERVER['REQUEST_URI'];
		echo "<pre>";
		var_dump($_SERVER);
		echo "</pre>";
	}

	public function parseRequest()
	{
		if(preg_match_all($this->rules, $this->request, $matches)) {
			
		}

	}
}


?>