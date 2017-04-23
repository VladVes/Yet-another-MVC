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
		} else {
			$actionMethod = 'action'. ucfirst($this->defaultAction);
		}
		Log::write('running {$actionMethod}');
		$this->$actionMethod();
	}


}

?>