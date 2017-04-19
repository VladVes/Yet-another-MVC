<?php
namespace app\controllers;


class FrontController extends Controller
{
	public function actionIndex()
	{
		echo "<br> frontController actionIndex";
		echo "<pre>";
		var_dump($_SERVER);
		echo "<pre>";

		\app\base\Application::call()->request_manager;
		
	}
}


?>