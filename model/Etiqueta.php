<?php

	class Etiqueta {

		private $rfid = NULL;
		private $idProduto = NULL;


		function __construct ($rfid, $idProduto) {
			$this->rfid = $rfid;
			$this->idProduto = $idProduto;
		}


		function getRfid() {
			return $this->rfid;
		}
		function getIdProduto() {
			return $this->idProduto;
		}
	}
?>