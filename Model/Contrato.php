<?php

	class Contrato {

		private $idContrato;
		private $status;

		public function inserirContrato ($idContrato, $status) {
	        $this->idContrato = $idContrato;
	        $this->status = $status;
    	}

		public function __destruct() {
        //Remove os dados da classe
    	}
		
		public function setIdContrato($idContrato) {
        	$this->idProduto = $idContrato;
    	}
		public function setStatus ($status) {
			$this->status = $status;
		}
		
		public function getIdContrato() {
			return $this->idContrato;
		}
		public function getStatus() {
			return $this->status;
		}
	}
?>