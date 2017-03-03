<?php
namespace app\services;
use app\interfaces\IFactory;


class RenderFactoryB extends RenderFactory implements IFactory
{
	public function create()
	{
		echo "<br>The B factory! <br>";
		
		$renderer = "app\services\Renderer_" . $this->renderer; 
		
		if(class_exists($renderer)) {
					
			$r = new $renderer();	
			return $r;

		} else {
			echo "class not found!";
			return false;
		} 
	}
}

?>