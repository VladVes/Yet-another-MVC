<?php
namespace app\services;
use app\interfaces\IFactory;


class RenderFactoryA extends RenderFactory implements IFactory
{
	public function create()
	{
		echo "<br>The A factory! <br>";
		
		$renderer = "app\services\Renderer_" . $this->renderer; 
		
		//return new $renderer;
		if(class_exists($renderer)){
			
			//echo "class exists<br>";
			//echo "$renderer<br>";
			
			$r = new $renderer();
			

			//echo "The obj = "; var_dump($r);
			
			return $r;

		}else {
			//throw new Exeption("Incorrect renderer!");
			echo "class not found!";
			return false;

		//parent::create();
		}

	}
}

?>