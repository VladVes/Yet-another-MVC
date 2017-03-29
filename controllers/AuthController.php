<?php
namespace app\controllers;
use app\services\Auth;
use app\services\Logout;
use app\models\User;

class AuthController extends Controller
{
	public function actionIndex()
	{
		session_start();
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])) {
		
			$auth = new Auth();
			$auth->unsetCookie();
			$auth->closeSession();
			$this->redirect('');
		}
		
		
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login']))
		{
			$rem = (isset($_POST['rem']))? true : false;
						
			if((new Auth())->login($_POST['login'], $_POST['pass'], $rem)) {
				$this->redirect('');
			}
		}

		if ((new User())->getUserId() != null) {
			$this->render('logout');
		} else {
			$this->render("login");
		}

	}
}


?>