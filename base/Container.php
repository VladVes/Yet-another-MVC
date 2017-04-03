<?php
namespace app\base;

class Container
{
	protected $items = [];

	public function set($object, $key)
	{
		$this->items[$key] = $object;
	}

	public function get($key)
	{
		if(!isset($this->items[$key])){
			$this->items[$key] = Application::call()-createComponent($key);
			return $this->items[$key];
		}
		return $this->items[$key];
	}
}

?>