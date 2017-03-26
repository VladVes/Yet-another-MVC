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
		
		
		if(class_exists($renderer)){
			$r = new $renderer();
			return $r;

		}else {
			//throw new Exeption("Incorrect renderer!");
			echo "class not found!";
			return false;
		} 

	}
}

?>