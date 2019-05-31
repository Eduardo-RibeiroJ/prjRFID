<?php

	class Etiqueta {

		private $rfid;
		private $idProduto ;


		public function __construct ($rfid, $idProduto) {
			$this->rfid = $rfid;
			$this->idProduto = $idProduto;
		}

		public function __destruct() {
        //Remove os dados da classe
    	}
    	
		public function getRfid() {
			return $this->rfid;
		}
		public function getIdProduto() {
			return $this->idProduto;
		}
	}
?>