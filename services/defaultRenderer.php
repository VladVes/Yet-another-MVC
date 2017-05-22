<?php

namespace app\services;
use app\services\D;

class defaultRenderer 
{
	protected $template;
	protected $layout;
	const DEFAULT_TEMPLATE = 'default';
	const DEFAULT_LAYOUT = 'mainLayout';
	const TEMPLATE_DIR = 'views';

	public function run($template = '', $params = [])
	{
		$this->layout = self::DEFAULT_LAYOUT;
		$content = '';
		foreach ($params as $key => $val) {
			if (is_array($val)) {
				$content = $this->render('', ['row' => $val])
			}
		}

		echo $this->render($this->layout, ['content' => $this->render($template, $params)]);
	}

	protected function render($template, $params)
	{
		
		if ($template !== 'mainLayout') {
			
			$this->template = $template ?: self::DEFAULT_TEMPLATE;
				
			$tmpFullName =  lcfirst(str_replace(['app\controllers\\','Controller', 'app\services\\' ], '', get_called_class())) . "/" . ucfirst($this->template) . "Template.php";
			
		} else {
			$tmpFullName = "layouts/" . ucfirst($this->layout) . "Template.php";
			echo $tmpFullName;

		}

		$path = "../" . self::TEMPLATE_DIR . "/{$tmpFullName}";

		extract($params);
		ob_start();
		include $path;
		return ob_get_clean();
	}
}

?>
