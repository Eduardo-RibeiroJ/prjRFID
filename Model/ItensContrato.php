<?php

	class ItensContrato {

		private $idContrato;
		private $rfidProduto;
		private $horaSaida;
		private $horaEntrada;
		private $obs;


		public function __construct ($idContrato, $rfidProduto, $horaSaida) {
			$this->idContrato = $idContrato;
			$this->rfidProduto = $rfidProduto;
			$this->horaSaida = $horaSaida;
		}

		public function __destruct() {
        //Remove os dados da classe
    	}

		public function setHoraSaida ($horaSaida) {
			$this->horaSaida = $horaSaida;
		}
		public function getHoraSaida() {
			return $this->horaSaida;
		}

		public function setHoraEntrada ($horaEntrada) {
			$this->horaEntrada = $horaEntrada;
		}
		public function getHoraEntrada() {
			return $this->horaEntrada;
		}

		public function setObs ($obs) {
			$this->obs = $obs;
		}
		public function getHoraEntrada() {
			return $this->horaEntrada;
		}

		public function getRfid() {
			return $this->rfid;
		}
		public function getIdProduto() {
			return $this->idProduto;
		}

	}
?>