<?php

include_once "Model/Conexao.php";

class EtiquetaController { 

	public static function getEtiquetas($rfid = 0, $json = false){

		if(!empty($rfid))
			$rfidWhere = ' where tbEtiqueta.rfid = '.$rfid.' ';
		else
			$rfidWhere = '';
		
			 $sql = "select 
					tbEtiqueta.rfid,
					tbProduto.idProduto,
					tbProduto.nomeProd
					from tbEtiqueta inner join tbProduto on tbProduto.idProduto = tbEtiqueta.idProduto ".$rfidWhere;

			$db = new Conexao();
			$dados = mysqli_query($db->getConection(),$sql); 
	       
	       if($json){	       	
       			$linha = mysqli_fetch_object($dados);
       			return json_encode($linha, true);
	       }else{	    
	       	
    			return $dados;
	       }
   }

   

	public static function deletarEtiquetas($rfid){

		if(!empty($rfid))
		{
		   try {

				$sql = "DELETE FROM tbEtiqueta  WHERE rfid = '".$rfid."'";

				$db = new Conexao();
				$dados = mysqli_query($db->getConection(),$sql); 

				return true;
				
			} catch (Exception $e) { } 
		} 

		return false;
   }

}
