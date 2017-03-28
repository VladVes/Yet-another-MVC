<?php
namespace app\controllers;
use app\services\Auth;

class AuthController extends Controller
{
	public function actionIndex()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login']))
		{
			$rem = (isset($_POST['rem']))? true : false;
						
			if((new Auth())->login($_POST['login'], $_POST['pass'], $rem)) {
				$this->redirect('');
			}
		}

		$this->render("login");
	}
}


?>