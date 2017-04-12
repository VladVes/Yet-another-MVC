<?php
namespace app\services;
use app\base\Application;

class Container
{
	protected $component = [];

	public function getComponent($name)
	{
		if(!isset($this->component[$name])) {
			$this->component[$name] = Application::call()->createComponent($name);
		}
		return $this->component[$name];
	}

}


?>