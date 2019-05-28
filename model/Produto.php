<?php

	class Produto {

		private $nomeProduto = NULL;
		private $personalizado = NULL;
		private $cor = NULL;
		private $obs = NULL;
		private $quantTotal = NULL;
		private $quantDisponivel = NULL;

		function __construct ($nomeProduto, $personalizado, $cor, $obs) {
			$this->nomeProduto = $nomeProduto;
			$this->personalizado = $personalizado;
			$this->cor = $cor;
			$this->obs = $obs;
		}

		function setQuantTotal($quantTotal) {
			$this->quantTotal = $quantTotal;
		}
		function getQuantTotal() {
			return $this->quantTotal;
		}

		function setQuantDisponivel($quantDisponivel) {
			$this->quantDisponivel = $quantDisponivel;
		}
		function getQuantDisponivel() {
			return $this->quantDisponivel;
		}
	}
?>