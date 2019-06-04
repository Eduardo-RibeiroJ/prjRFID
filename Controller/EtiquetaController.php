<?php

include_once "Model\Conexao.php";

class EtiquetaController { 

	public static function getEtiquetas($rfid = 0){

		if(!empty($rfid))
			$rfidWhere = ' where tbetiqueta.rfid = '.$rfid.' ';
		else
			$rfidWhere = '';
		
			 $sql = "select 
					tbetiqueta.rfid,
					tbproduto.idProduto,
					tbproduto.nomeProd
					from tbetiqueta inner join tbproduto on tbproduto.idProduto = tbetiqueta.idProduto ".$rfidWhere;

			$db = new Conexao();
			$dados = mysqli_query($db->getConection(),$sql); 
	       
	        return $dados;
   }

   

	public static function deletarEtiquetas($rfid){

		if(!empty($rfid))
		{
		   try {

				$sql = "DELETE FROM tbetiqueta  WHERE rfid = '".$rfid."'";

				$db = new Conexao();
				$dados = mysqli_query($db->getConection(),$sql); 

				return true;
				
			} catch (Exception $e) { } 
		} 

		return false;
   }

}