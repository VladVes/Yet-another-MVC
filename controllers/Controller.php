<?php
namespace app\controllers;
use app\services\Log;

abstract class Controller
{
	protected $defaultAction = 'index';

	public function __construct()
	{

	}

	public function run($action = null)
	{
		echo "<br> controller running controller!";
		if(!is_null($action)) {
			$actionMethod = 'action' . ucfirst($action);
			Log::write('running {$actionMethod}');
		} else {
			$actionMethod = 'action'. ucfirst($this->defaultAction);
			Log::write('running default Action');
		}
		$this->$actionMethod();
	}


}

?>