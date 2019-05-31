<?php
  
class Conexao 
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "bd_rfid";
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
                  $this->database);
    }
}
  
?>