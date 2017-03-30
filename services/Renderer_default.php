<?php
namespace app\services;
use app\interfaces\IRenderer;

class Renderer_default extends Renderer implements IRenderer
{

	protected $a;

	public function render($template, $params = [])
	{
		//работа с view - 

		echo "<br>Starting default rendrerer...<br>";

		parent::render($template, $params);

	}

}

?>