<?php
namespace app\controllers;

class DefaultController extends Controller
{
	public function actionIndex($params = [])
	{
		$this->render('default', ['testVal' => '<h3 style="color: red";>It works!</h3>']);
	}
}

?>