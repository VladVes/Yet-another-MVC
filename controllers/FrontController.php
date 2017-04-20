<?php
namespace app\controllers;


class FrontController extends Controller
{
	public function actionIndex()
	{
		echo "<br> frontController actionIndex <br>";
		
		echo '<br>$_REQUEST : ';
		echo "<pre>";
		var_dump($_REQUEST);
		echo "</pre>";

		echo '<br>$_SERVER : ';
		echo "<pre>";
		var_dump($_SERVER);
		echo "</pre>";

		echo '<br>$GLOBALS : ';
		echo "<pre>";
		var_dump($GLOBALS);
		echo "</pre>";

		echo '<br>$_GET : ';
		echo "<pre>";
		var_dump($_GET);
		echo "</pre>";	
		
		echo '<br>$_POST : ';
		echo "<pre>";
		var_dump($_POST);
		echo "</pre>";

		echo '<br>$_FILES : ';
		echo "<pre>";
		var_dump($_FILES);
		echo "</pre>";

		echo '<br>$_COOKIE : ';
		echo "<pre>";
		var_dump($_COOKIE);
		echo "</pre>";	

		echo '<br>$_SESSION : ';
		echo "<pre>";
		var_dump($_SESSION);
		echo "</pre>";	

		echo '<br>$_ENV : ';
		echo "<pre>";
		var_dump($_ENV);
		echo "</pre>";

		/*
		$GLOBALS
		$_SERVER
		$_GET
		$_POST
		$_FILES
		$_COOKIE
		$_SESSION
		$_REQUEST
		$_ENV
		*/

		\app\base\Application::call()->request_manager;
		echo ("Controller: " . \app\base\Application::call()->request_manager->getControllerName());
		echo ("Action: " . \app\base\Application::call()->request_manager->getActionName());
		echo ("Params: " . \app\base\Application::call()->request_manager->getParams());
		
	}
}


?>