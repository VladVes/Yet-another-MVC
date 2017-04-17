<?php
namespace app\controllers;


class FrontController extends Controller
{
	public function actionIndex()
	{
		echo "<br> frontController actionIndex";

		\app\base\Application::call()->request_manager;
		
	}
}


?>