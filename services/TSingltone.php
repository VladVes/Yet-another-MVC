<?php
namespace app\services;

trait TSingltone
{
	protected static $instance = null;

	protected function __construct(){}
    protected function __clone(){}
    protected function __wakeup(){}

    public static function getInstance(){
        if(is_null(static::$instance)){
            static::$instance = new static;
        }
        return static::$instance;
    }
}


?> 