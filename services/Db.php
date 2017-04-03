<?php

//use app\services\Db;
namespace app\services;
use app\services\TSingltone;
use \PDO;

class Db
{
    protected $conn;
    
    protected $dbConfig = [
        'driver' => DRIVER,
        'host' => HOST,
        'login' => LOGIN,
        'password' => PASSWD,
        'database' => DATABASE
    ]; 

    //use TSingltone;
    
    public __construct($driver, $host, $login, $password, $database)
    {
        $dbconfig['driver'] = $driver;
        $dbconfig['host'] = $host;
        $dbconfig['login'] = $login;
        $dbconfig['password'] = $password;
        $dbconfig['database'] = $database;
    }


    public function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new PDO(
                $this->prepareDnsString(),
                $this->dbConfig['login'],
                $this->dbConfig['password']
            );

            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->conn;
    }


    /**
     * @param $sql
     * @param $params
     * @return PDOStatement
     */

    public function query($sql, $params = [])
    {
        $smtp = $this->getConnection()->prepare($sql);
        $smtp->execute($params);
        return $smtp;
    }

    public function fetchAll($sql, $params = [])
    {
        $smtp = $this->query($sql, $params);
        return $smtp->fetchAll();
    }

    public function fetchOne($sql, $params = [])
    {
        //return $this->fetchAll($sql, $params)[0];

        $res = $this->fetchAll($sql, $params);
        
        if (isset($res[0])) {
            return $res[0];
        } else {
        return false;
        }
    }

    public function fetchObject($sql, $params = [], $class)
    {
        $smtp = $this->query($sql, $params);
        $smtp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        return $smtp->fetch();
    }

    /**
     * Запрос на исполнение
     * @param $sql
     * @param $params
     * @return int - количество обработанных запросом строк
     */
    
    public function execute($sql, $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    protected function prepareDnsString()
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=UTF8",
            $this->dbConfig['driver'],
            $this->dbConfig['host'],
            $this->dbConfig['database']
        );
    }
}