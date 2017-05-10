<?php
namespace app\services;
use \PDO;

class Db
{
	private connection;
	private conParams = [
		'driver' => '',
		'host' => '',
		'database' => '',
		'charset' => '',
		'login' => '',
		'password' => ''
	];

	public function __construct($driver, $host, $database, $charset, $login, $password)
	{
		$this->conParams['driver'] = $driver;
		$this->conParams['host'] = $host;
		$this->conParams['database'] = $database;
		$this->conParams['charset'] = $charset;
		$this->conParams['login'] = $login;
		$this->conParams['password'] = $password;
	}

	public function getConnection()
	{
		if(is_null($this->connection)) {
			$this->connection = new PDO(
				$this->dsnPrepare(), 
				$this->conParams['login'],
				$this->conParams['password']
				);

		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->connection->setAttribute(PDO::DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		}
		return $this->connection;
	}

	public function query($sql, $params = [])
	{
		$stmt = $this->getConnection()->prepare($sql);
		$stmt->execute($params);
		return $stmt;
	}


	public function fetchAll($sql, $params = [])
	{
		$stmt = $this->query($sql, $params);
		return $stmt->fetchAll();
	}


	public function fetchOne($sql, $params = [])
	{
		$stmt = $this->query($sql, $params);
		return $stmt->fetch();
	}


	public function fetchObject($sql, $params = [], $class)
	{
		$stmt = $this->query($sql, $params);
		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $class);
		return $stmt->fetch();
	}


	public function execute($sql, $params = [])
	{
		$this->query($sql, $params);
		return true;
	}


	protected function dsnPrepare()
	{
		return sprintf(
			"%s:host=%s;dbname=%s;charset=%s", 
			$this->conParams['driver'],
			$this->conParams['host'],
			$this->conParams['dbname'],
			$this->conParams['charset']
			);
	}

}

?>