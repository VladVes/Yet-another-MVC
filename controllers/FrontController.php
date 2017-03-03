<?php
namespace app\controllers;
use app\services\RequestManeger;

class FrontController extends Controller
{
	public function __construct()
	{
		echo "Front controller constructed!<br>";
	}

	public function actionIndex()
	{
		echo "Front Controller action Index<br>";

		$rm = new RequestManeger();

		$controllerName = $rm->getControllerName();
		$actionName = $rm->getActionName();


		$controllerName = sprintf('app\controllers\%sController', ucfirst($controllerName));

			if(isset($_REQUEST['factory'])) {
				$f = 'app\services\\' . $_REQUEST['factory'];
				$factory = new $f($_REQUEST['renderer']);
			} else die();

			$controller = new $controllerName($factory);
			$controller->run($actionName); //вызов метода контроллера

		
			
			echo "URLs for testing with FactoryA and Twig renderer:<br>
				<a href=\"index.php?c=category&id=1&factory=RenderFactoryA&renderer=twig\">Category 1</a><br>
				
				<a href=\"index.php?c=product&id=1&factory=RenderFactoryA&renderer=twig\">product 1</a><br>";


			echo "URLs for testing with FactoryA and default renderer:<br>
				<a href=\"index.php?c=category&a=showdesc&id=1&factory=RenderFactoryA&renderer=default\">Category 1</a><br>

				<a href=\"index.php?c=category&a=showdesc&id=2&factory=RenderFactoryA&renderer=default\">Category 2</a><br>

				<a href=\"index.php?c=product&a=card&id=2&factory=RenderFactoryA&renderer=default\">Product 1</a><br>
				<a href=\"index.php?c=product&a=card&id=2&factory=RenderFactoryA&renderer=default\">Product 2</a><br>
				<a href=\"index.php?c=product&a=card&id=3&factory=RenderFactoryA&renderer=default\">Product 3</a><br>
				<a href=\"index.php?c=product&a=card&id=4&factory=RenderFactoryA&renderer=default\">Product 4</a><br>";
				echo "+++++++++++++++++++++++++++<br>";
			echo "URLs for testing with FactoryA and Alpha renderer:<br>
				<a href=\"index.php?c=category&a=showdesc&id=1&factory=RenderFactoryA&renderer=alpha\">Category 1</a><br>
				<a href=\"index.php?c=category&a=showdesc&id=2&factory=RenderFactoryA&renderer=alpha\">Category 2</a><br>
				<a href=\"index.php?c=product&a=card&id=2&factory=RenderFactoryA&renderer=alpha\">Product 1</a><br>
				<a href=\"index.php?c=product&a=card&id=2&factory=RenderFactoryA&renderer=alpha\">Product 2</a><br>
				<a href=\"index.php?c=product&a=card&id=3&factory=RenderFactoryA&renderer=alpha\">Product 3</a><br>
				<a href=\"index.php?c=product&a=card&id=4&factory=RenderFactoryA&renderer=alpha\">Product 4</a><br>";
				echo "+++++++++++++++++++++++++++<br>";
			echo "URLs for testing with FactoryB and renderer betta:<br>
				<a href=\"index.php?c=category&a=showdesc&id=1&factory=RenderFactoryB&renderer=betta\">Category 1</a><br>
				<a href=\"index.php?c=category&a=showdesc&id=2&factory=RenderFactoryB&renderer=betta\">Category 2</a><br>
				<a href=\"index.php?c=product&a=card&id=2&factory=RenderFactoryB&renderer=betta\">Product 1</a><br>
				<a href=\"index.php?c=product&a=card&id=2&factory=RenderFactoryB&renderer=betta\">Product 2</a><br>
				<a href=\"index.php?c=product&a=card&id=3&factory=RenderFactoryB&renderer=betta\">Product 3</a><br>
				<a href=\"index.php?c=product&a=card&id=4&factory=RenderFactoryB&renderer=betta\">Product 4</a><br>";
			
	}		
}
?>
