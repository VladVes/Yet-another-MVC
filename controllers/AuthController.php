<?php
namespace app\controllers;
use app\base\Application;

class AuthController extends Controller
{
	public function actionIndex()
	{
		session_start();
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])) {
		
			$auth = Application::call()->auth;
			$auth->unsetCookie();
			$auth->closeSession();
			
			$this->redirect('');
		}
		
		
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login']))
		{
			$rem = (isset($_POST['rem']))? true : false;
						
			if(Application::call()->auth->login($_POST['login'], $_POST['pass'], $rem)) {
				$this->redirect('');
			}
		}

		if (Application::call()->user->getUserId() != null) {
			$this->render('logout');
		} else {
			$this->render("login");
		}

	}
}


?>