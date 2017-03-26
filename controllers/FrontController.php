<?php
namespace app\controllers;
use app\services\RequestManeger;
use app\models\User;

class FrontController extends Controller
{
	const DEFAULT_FACTORY = 'RenderFactoryA';

	protected $controllerName;
	protected $actionName;

	public function __construct()
	{
		//echo "Front controller constructed!<br>";
	}

	public function actionIndex()
	{
		$rm = new RequestManeger();

		$this->controllerName = $rm->getControllerName();
		$this->actionName = $rm->getActionName();

		$this->checkUser();
	
		$this->controllerName = sprintf('app\controllers\%sController', ucfirst($this->controllerName));
		

		if(isset($_REQUEST['factory'])) {
			$f = 'app\services\\' . $_REQUEST['factory'];
		} else {
			$f = 'app\services\\' . self::DEFAULT_FACTORY;
		}

		$factory = new $f('alpha');

		$controller = new $this->controllerName($factory);

		$controller->run($this->actionName); //вызов метода контроллера

	}

	protected function checkUser(){
		session_start();
			if ($this->controllerName != 'auth') {
				$user = (new User())->getCurrent();
				if (!$user) {
					$this->redirect('auth');
			}
		}
	}	
}
?>
