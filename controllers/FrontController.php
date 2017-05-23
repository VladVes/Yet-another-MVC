<?php
namespace app\controllers;
use app\base\Application;
use app\services\D;


class FrontController extends Controller
{
	public function actionIndex()
	{
		//echo "<br> frontController actionIndex <br>";
		Application::call()->request_manager;

		
		/*/-------------db tests
		
		$sql = "SELECT * FROM product WHERE product_price > ?;";
		$par = ['30'];
		D::vd(Application::call()->db->fetchAll($sql, $par));
		
		//-----------------
		
		//-----------------
		Application::call()->debug->showGlobalArrs();
		
		echo ("Controller: " . \app\base\Application::call()->request_manager->getControllerName() . "<br>");
		echo ("Action: " . \app\base\Application::call()->request_manager->getActionName() . "<br>" );
		echo ("Params: ");
		var_dump(\app\base\Application::call()->request_manager->getParams());
		//------------------
		*/

		$this->name = "\app\controllers\\" . ucfirst(\app\base\Application::call()->request_manager->getControllerName()) . 'Controller';
		
		$controller = new $this->name;

		$controller->setParams(\app\base\Application::call()->request_manager->getParams());
		$controller->run(\app\base\Application::call()->request_manager->getActionName());
		
		//D::vd($controller);
	}
}


?>