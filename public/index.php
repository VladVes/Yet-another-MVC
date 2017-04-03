<?php
/* namespace app\models;
use app\controllers\FrontController;
use app\services\Autoload;
use app\services\RenderFactoryA;
use app\services\RenderFactoryB;

//use app\controllers\ProductController;

require_once("../config/config.php");

spl_autoload_register([new Autoload(), 'uploadClass']);


(new FrontController())->run();  */ // - Old version

include_once "../base/Application.php";

(new \app\base\Application())->run();



?>