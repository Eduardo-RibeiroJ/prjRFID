<?php
  
class Usuario {
  	
  	private $idUsuario;
    private $nomeUsuario;
    private $email;
    private $senha;
    private $nivel;
  

    public function inserirUsuario ($nomeUsuario, $email, $senha, $nivel) {
        $this->nomeUsuario = $nomeUsuario;
        $this->email = $email;
        $this->senha = $senha;
        $this->nivel = $nivel;
    }
    public function atualizarUsuario ($idUsuario, $nomeUsuario, $email, $senha, $nivel) {
        $this->idUsuario = $idUsuario;
        $this->nomeUsuario = $nomeUsuario;
        $this->email = $email;
        $this->senha = $senha;
        $this->nivel = $nivel;
    }

    public function __destruct() {
        //Remove os dados da classe após a execução
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }
    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function getSenha() {
        return $this->senha;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }
    public function getNivel() {
        return $this->nivel;
    }
}

?>