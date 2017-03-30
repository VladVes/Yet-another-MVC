<?php
namespace app\models;
use app\services\Autoload;
use app\services\RenderFactoryA;
use app\services\RenderFactoryB;

//use app\controllers\ProductController;

require_once("../config/config.php");

spl_autoload_register([new Autoload(), 'uploadClass']);

if (isset($_REQUEST['c']) && isset($_REQUEST['a'])) {
	
	$controllerName = $_REQUEST['c'];
	$actionName = $_REQUEST['a'];

	$controllerName = sprintf('app\controllers\%sController', ucfirst($controllerName));

	if(isset($_REQUEST['factory'])) {
		
		$f = 'app\services\\' . $_REQUEST['factory'];
		
		
		$factory = new $f($_REQUEST['renderer']);

		//$renderType = $_REQUEST['renderer'];
		//$factory->setRenderer($renderType);

	} else die();
	

	echo $controllerName;
	$controller = new $controllerName($factory);

	$controller->run($actionName); //вызов метода контроллера

} else {
	echo "<p style=\"width: 800px;\"><br>Старался эксперементировать, создал 2 фабрики объектов, которые могут создавать объекты 3 разных классов Renderer_...  в зависимости от переданного в конструктор фабрики имени класса рендера. <br>

		Клаcc Сontroller может одинаково работать со всеми фабриками и соответсвенно со всеми рендерами.

		Над интерфейсом для тестирования сильно не замарачивался, сделал несколько готовых URL. Выбор фабрики и рендера определяется через url:<br> 
		Фабрика - factory может быть равным RenderFactoryA или RenderFactoryB<br>
		<br>
		Рендерер - renderer может принимать значения default, alpha, betta.
		<br>Различия между ними совсем небольшие, но этого уже второстепенные художества 
		<br></p>";

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

?>