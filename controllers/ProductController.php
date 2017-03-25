<?php

namespace app\controllers;
use app\models\Product;
use app\services\RequestManeger;

class ProductController extends Controller
{
	// задача отображать карточку товара
	
	// что бы отличить экшены от служебных методов к экшенам добаляют приставку action
	//к примеру actionGet()
	protected $useLayout = false;

	public function actionIndex()
	{
		//экшн по умолчанию! традиционно называют actionIndex
		
		echo "Product INDEX";
		$this->render('index');
		
	}

	public function actionCard()
	{
		//получение данных о товаре - обращение к модели
		
		/*echo "Product actionCard!";
		exit(); */

		//$id = $_GET['id'];

		$id = (new RequestManeger())->getParams()[0];

		//echo "id is {$id}";
		//exit();
		
		$this->render('card', ['model' => Product::getCardById($id)]);

		//var_dump($model);
	}

}

?>