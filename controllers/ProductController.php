<?php

namespace app\controllers;
use app\models\ProductModel;

class ProductController extends Controller
{
	const DEFAULT_TEMPLATE = 'productDefault';
	const BASE_TEMPLATE = 'product';
	//const BASE_TEMPLATE_ALL = 'productAll';
	
	public function actionIndex()
	{
		$this->render(self::DEFAULT_TEMPLATE, ['welcome' => 'Welcome to the products page.']);
	}

	public function actionShow()
	{	
		if (!empty($this->params[0])) {
			$id = $this->params[0];
			$product = $this->getOne($id);
		} else $product = $this->getAll();
		
		$this->render(self::BASE_TEMPLATE, ['welcome' => 'Welcome dear customer!', 'sample' => $product]);
	}

	protected function getOne($id)
	{
		$model = \app\base\Application::call()->factory->call('ProductModel');
		return $model->fetchOneById($id);
	}

	protected function getAll()
	{
		$model = \app\base\Application::call()->factory->call('ProductModel');
		return $model->fetchAll();
	}
}


?>