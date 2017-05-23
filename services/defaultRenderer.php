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
		
		$subContent = '';
		$content = [];
		$subTemplate = '';
	
		foreach ($params as $key => $val) {
			if (is_array($val)) {
				$subTemplate = $template . "Template" . "_" . ucfirst($key) . ".php";
				$NotSubArray = true;

				foreach ($val as $valkey => $arr) {
					if (is_array($arr)) {
						$NotSubArray = false;
						$subContent .= $this->render($subTemplate, ['sample' => $arr]);
					}
				} 
				if ($NotSubArray) {
					$subContent .= $this->render($subTemplate, ['sample' => $val]);
				}

			} else {
				$content[$key] = $val;
			}
		}
		$content['subContent'] = $subContent;
		$template .= "Template.php";

		echo $this->render($this->layout, ['content' => $this->render($template, $content)]);
	}

	protected function render($template, $params)
	{
		
		if ($template !== 'mainLayout') {
			$this->template = $template ?: self::DEFAULT_TEMPLATE;
			$tmpFullName =  lcfirst(str_replace(['app\controllers\\','Controller', 'app\services\\' ], '', get_called_class())) . "/" . ucfirst($template);	
		} else {
			$tmpFullName = "layouts/" . ucfirst($this->layout) . "Template.php";
		}

		$path = "../" . self::TEMPLATE_DIR . "/{$tmpFullName}";

		extract($params);
		ob_start();
		include $path;
		return ob_get_clean();
	}
}

?>
