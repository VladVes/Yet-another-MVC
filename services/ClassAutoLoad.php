<?php
namespace app\services;

class ClassAutoLoad
{
	const ERR = "Class not found!";

	public function autoLoad($className)
	{
		$className = substr($className, 4)
		$className = srt_replace('\\', '/', $className);
		$fileName = "../{$className}.php"

		if (file_exists($fileName)){
			require_once $fileName;
		} else ERR;
	}
}

?>