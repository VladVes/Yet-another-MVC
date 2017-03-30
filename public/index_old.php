<?php
namespace app\models;
use app\services\Autoload;
//use app\controllers\ProductController;

require_once("../config/config.php");

spl_autoload_register([new Autoload(), 'uploadClass']);

$order = new Order();

echo "Получаем заказ #1 :<br>";
$order->getOrder(1);

echo "<br>";

echo "Получаем все заказы: <br>";
$order->getAllOrders();

$controllerName = $_REQUEST['c'];
$actionName = $_REQUEST['a'];
//$actionName = $_REQUEST['a']?:'index';  - проверку перенесли в контроллер
//if (empty($actionName)) ... actionName = "index";

$controllerName = sprintf('app\controllers\%sController', ucfirst($controllerName));
$controller = new $controllerName();
$controller->run($actionName); //вызов метода контроллера





?>