<?php
namespace app\services;

class Autoload
{

	public function uploadClass($className)
	{
		$class = $className;
		$class = str_replace("\\", "/", $class);
		$class = substr($class, 4);
		$fileName = "../{$class}.php";
		
		if(file_exists($fileName)) {
			require_once($fileName);
		}		
	}
}

?>