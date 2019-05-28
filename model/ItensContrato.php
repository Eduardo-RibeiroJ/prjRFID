<?php

	class Etiqueta {

		private $idContrato = NULL;
		private $rfidProduto = NULL;
		private $horaSaida = NULL;
		private $horaEntrada = NULL;
		private $obs = NULL;


		function __construct ($idContrato, $rfidProduto, $horaSaida, $horaEntrada, $obs) {
			$this->idContrato = $idContrato;
			$this->rfidProduto = $rfidProduto;
			$this->horaSaida = $horaSaida;
			$this->horaEntrada = $horaEntrada;
			$this->obs = $obs;
		}

		function setHoraSaida ($horaSaida) {
			$this->horaSaida = $horaSaida;
		}

		function setHoraEntrada ($horaEntrada) {
			$this->setHoraEntrada = $horaEntrada;
		}

		function getRfid() {
			return $this->rfid;
		}
		function getIdProduto() {
			return $this->idProduto;
		}
	}
?>