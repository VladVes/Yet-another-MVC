<?php
namespace app\services;

class BasicFactory
{
	protected $instance = [];

	public function call($name)
	{
		if (!isset($instance[$name])) {
			$this->instance[$name] = $this->build($name);
		}
		return $this->instance[$name];
	}
	protected function build($name)
	{
		preg_match('/(Model|Controller)/', $name, $matches);
		$dir = lcfirst($matches[1]) . "s";
		
		$fullName = "app\\$dir\\$name";

		echo ('FULL NAME !!!!!!!!!!!!!!!!!!!!!!!!!!!' . $fullName);

		if(class_exists($fullName)) {
			return new $fullName;
		}
		return null;
	}
}

?>