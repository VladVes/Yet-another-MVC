<?php
namespace app\controllers;
use app\models\Type;

class CategoryController extends Controller
{
	//get and show description of one or more category
	public function actionIndex()
	{
		echo "Category INDEX";
	}


	public function actionShowDesc()
	{
		$id = $_GET['id'];
		$this->render('category', ['category' => Type::getById($id)]);
	}

}

?>