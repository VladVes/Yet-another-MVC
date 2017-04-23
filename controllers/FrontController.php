<?php
namespace app\controllers;
use app\base\Application;


class FrontController extends Controller
{
	public function actionIndex()
	{
		echo "<br> frontController actionIndex <br>";
		Application::call()->request_manager;
		
		//-----------------
		Application::call()->debug->showGlobalArrs();
		
		echo ("Controller: " . \app\base\Application::call()->request_manager->getControllerName() . "<br>");
		echo ("Action: " . \app\base\Application::call()->request_manager->getActionName() . "<br>" );
		echo ("Params: ");
		var_dump(\app\base\Application::call()->request_manager->getParams());
		//------------------
		
	}
}


?>