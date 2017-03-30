<?php
namespace app\services;


abstract class RenderFactory
{
	protected $renderer;

	public function __construct($renderer_name)
	{
		$this->renderer = $renderer_name;
	}

	public function create()
	{
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
		} 

	}
}

?>