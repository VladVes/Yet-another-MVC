<?php

namespace app\controllers;
use app\models\ProductModel;

class ProductController extends Controller
{
	const DEFAULT_TEMPLATE = 'productDefault';
	const SAMPLE_TEMPLATE = 'productSample';

	public function actionIndex()
	{
		$this->render(self::DEFAULT_TEMPLATE, ['welcome' => 'Welcome to the products page.']);
	}

	public function actionShowOne()
	{	
		$id = $this->params[0];
		$product = $this->GetOne($id);
		$this->render(self::SAMPLE_TEMPLATE, ['welcome' => 'Welcome dear customer!', 'sample' => $product]);
	}

	protected function GetOne($id)
	{
		return (new ProductModel())->fetchOneById($id);
	}
}


?>