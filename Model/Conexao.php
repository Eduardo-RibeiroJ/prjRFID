<?php

class Conexao
{
	private $host = "177.55.116.99:41890";
	private $username = "rfid_coworking";
	private $password = "rfid_coworking#";
	private $database = "rfid";
	private $conexao = null;

	public function __construct()
	{
		$this->conect();
	}

	public function getConection()
	{
		return $this->conexao;
	}

	private function conect()
	{
		$this->conexao = mysqli_connect(
			$this->host,
			$this->username,
			$this->password,
			$this->database
		);
	}
}
