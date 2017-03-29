<?php
namespace app\services;

class Cookie
{
	public function createCookie($name, $value, $time)
	{
		setcookie($name, $value, $time);
	}

	public function clearCookie($name, $value)
	{
		setCookie($name, $value, time() - (3600 * 24 * 7) * 2);
	}
}



?>