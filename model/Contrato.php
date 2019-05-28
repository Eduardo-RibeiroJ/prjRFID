<?php

	class Contrato {

		private $idContrato = NULL;
		private $status = NULL;


		function __construct ($idContrato, $status) {
			$this->idContrato = $idContrato;
			$this->status = $status;
		}


		function setStatus ($status) {
			$this->status = $status;
		}
		
		function getIdContrato() {
			return $this->idContrato;
		}
		function getStatus() {
			return $this->status;
		}
	}
?>