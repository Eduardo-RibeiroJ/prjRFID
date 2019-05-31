<?php

	class Contrato {

		private $idContrato;
		private $status;


		public function __construct ($idContrato, $status) {
			$this->idContrato = $idContrato;
			$this->status = $status;
		}

		public function __destruct() {
        //Remove os dados da classe
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