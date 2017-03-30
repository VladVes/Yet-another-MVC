<?php
namespace app\services;
use app\interfaces\IRenderer;

class Renderer_alpha extends Renderer implements IRenderer
{
	protected $alpha;

	protected function renderTemplate($template, $params = [])
	{
    
	    $dir = '';
	    if($template != 'layouts/main'){
	        $dir = lcfirst(str_replace(['Controller', 'app\controllers\\', 'app\services\\'],'', get_called_class()))."/";
	    }

	    //$templatePath = $_SERVER['DOCUMENT_ROOT'] . "/../views/{$dir}{$template}.php";
	    //$templatePath = "../views/alpharenderer/{$dir}{$template}.php";
	    $templatePath = "../views/alpharenderer/{$template}.php";


	    //var_dump($params);
	    //echo "<br> !!!!print_r()<br>";
	    //print_r($params);
	    extract($params);
	    //var_dump($model);
	    ob_start();
	    include $templatePath;
	    return ob_get_clean();
	}
}


?>