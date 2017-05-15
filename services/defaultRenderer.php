<?php

namespace app\services;

class defaultRenderer 
{
	protected $template;
	protected $layout;
	const $defaultTemplate = 'default';
	const $defaultLayout = 'mainLayout';
	const $dir = 'views';

	public function run($template, $params)
	{
		echo $this->render($defaultLayout, ['content' => $this->render($template, $params)]);
	}

	protected function render($template, $params)
	{
		
		if ($template !== 'mainLayout') {
			
			$this->template = $template ?: $defaultTemplate;
			
			$tmpFullName =  lcfirst(str_replace(['app\controllers\\','Controller', '\\' ], '', get_called_class())) . "/" . ucfirst($this->template) . "Template.php";
		} else {
			$tmpFullName = "layouts/" . ucfirst($this->template) . "Template.php";
		}

		$path = "../{$this->dir}/{$tmpFullName}";

		

		extract($params);
		ob_start();
		include $path;
		return ob_get_clean();
	}
}

?>
