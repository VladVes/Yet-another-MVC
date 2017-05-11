<?php 
namespace app\services;

class D
{
	public static function vd($var)
	{
		echo "<pre>";
		var_dump($var);
		echo "<pre>";
	}

	public function showGlobalArrs($arr = 'all')
	{
		if($arr != 'all') {
			self::vd($arrName);
		}else {
			self::vd($_REQUEST);
			self::vd($_SERVER);
			self::vd($_GET);
			self::vd($_POST);
			self::vd($_FILES);
			self::vd($_COOKIE);
			self::vd($_SESSION);
			self::vd($_ENV);
		}
		
	}
}



?>
