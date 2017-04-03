<?php
/* define('SOMECONST', 'somevalue');
define('CURRENCY', 'Руб.');

require_once("../services/Autoload.php");
require_once("../vendor/autoload.php"); */  //Old version

define('DRIVER','mysql');
define('HOST','localhost');
define('LOGIN','u966101772_test');
define('PASSWD','123');
define('DATABASE','u966101772_l6db');

return [
	'template_root' => '../views/',
	'layout' => 'main',
	'components' => [
		'user' => [
			'class' => "app\\models\\User"
		],
		'auth' => [
			'class' => "app\\services\\Auth",
		],
		'request' => [
			'class' => "app\\services\\RequestManager",
		],
		'db' => [
			'class' => "app\\services\\Db",
			'driver' => DRIVER,
        	'host' => HOST,
        	'login' => LOGIN,
        	'password' => PASSWD,
        	'database' => DATABASE
		],
		'db_remote' => [
			'class' => "app\\services\\Db",
			'driver' => 'DRIVER2',
        	'host' => 'HOST2',
        	'login' => 'LOGIN2',
        	'password' => 'PASSWD2',
        	'database' => 'DATABASE2'
		],
		'renderer' => [
			'class' => "app\\services\\Renderer_apha"
		]
	]
];


?>