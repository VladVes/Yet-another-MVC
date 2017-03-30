<?php
namespace app\services;

abstract class Renderer
{
	protected $a;
	protected $layout = 'main';
	protected $useLayout = true;

	public function render($template, $params = [])
	{
		//работа с view - 

		if ($this->useLayout) {
            echo $this->renderTemplate('layouts/main', [
                'content' => $this->renderTemplate($template, $params)
            ]);
        }else{
            echo $this->renderTemplate($template, $params);
        }
	}

	protected function renderTemplate($template, $params = [])
	{
    
	    $dir = '';
	    if($template != 'layouts/main'){
	        $dir = lcfirst(str_replace(['Controller', 'app\controllers\\', 'app\services\\'],'', get_called_class()))."/";
	    }

	    //$templatePath = $_SERVER['DOCUMENT_ROOT'] . "/../views/{$dir}{$template}.php";
	    $templatePath = "../views/{$dir}{$template}.php";


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