<?php
  
class Produto {
  	
  	private $idProduto;
    private $nomeProduto;
    private $personalizado;
    private $cor;
    private $obs;
    private $quantTotal;
    private $quantDisponivel;
  

    public function inserirProduto ($nomeProduto, $personalizado, $cor, $obs, $quantTotal) {
        $this->nomeProduto = $nomeProduto;
        $this->personalizado = $personalizado;
        $this->cor = $cor;
        $this->obs = $obs;
        $this->quantTotal = $quantTotal;
    }
    public function atualizarProduto ($idProduto, $nomeProduto, $personalizado, $cor, $obs, $quantTotal) {
        $this->idProduto = $idProduto;
        $this->nomeProduto = $nomeProduto;
        $this->personalizado = $personalizado;
        $this->cor = $cor;
        $this->obs = $obs;
        $this->quantTotal = $quantTotal;
    }

    public function __destruct() {
        //Remove os dados da classe
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }
    public function getIdProduto() {
        return $this->idProduto;
    }

    public function setNomeProduto($nomeProduto) {
        $this->nomeProduto = $nomeProduto;
    }
    public function getNomeProduto() {
        return $this->nomeProduto;
    }

    public function setPersonalizado($personalizado) {
        $this->personalizado = $personalizado;
    }
    public function isPersonalizado() {
        return $this->personalizado;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }
    public function getCor() {
        return $this->cor;
    }

    public function setObs($obs) {
        $this->obs = $obs;
    }
    public function getObs() {
        return $this->obs;
    }

    public function setQuantTotal($quantTotal) {
        $this->quantTotal = $quantTotal;
    }
    public function getQuantTotal() {
        return $this->quantTotal;
    }

    public function setQuantDisponivel($quantDisponivel) {
        $this->quantDisponivel = $quantDisponivel;
    }
    public function getQuantDisponivel() {
        return $this->quantDisponivel;
    }
}

?>