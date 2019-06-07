<?php

include_once "Model\Conexao.php";

class MovimentacaoController { 

	public static function getMovimentacao(){
		
			 $sql = "select count(tbitenscontrato.idContrato) as total, tbcontrato.* from tbcontrato
					inner join tbitenscontrato on tbcontrato.idContrato = tbitenscontrato.idContrato
					group by tbcontrato.idContrato order by tbitenscontrato.horaSaida DESC";

			$db = new Conexao();
			$dados = mysqli_query($db->getConection(),$sql); 
	       
	        return $dados;
   }

	public static function getProdutosByMovimentacao($idContrato,$json = false){
		
			 $sql = "select  * from tbproduto
					inner join tbetiqueta on tbetiqueta.idProduto = tbproduto.idProduto
					inner join tbitenscontrato on tbitenscontrato.rfidProduto = tbetiqueta.rfid
					inner join tbcontrato on tbcontrato.idContrato = tbitenscontrato.idContrato
					where tbcontrato.idContrato = '".$idContrato."' ";


			$db = new Conexao();
			$dados = mysqli_query($db->getConection(),$sql); 
	       
	       
	       if($json){	       	

	        while($row = $dados->fetch_array(MYSQLI_ASSOC)) { $myArray[] = $row; }

 			return json_encode($myArray);
 			
	       }else{	    

    			return $dados;
	       }
   }

	public static function getTemp($json = false){
		
			 $sql = "select   tbetiqueta.rfid, tbproduto.nomeProd from tbtemp 
inner join tbetiqueta on tbetiqueta.rfid = tbtemp.etiqueta
inner join tbproduto on tbproduto.idProduto = tbetiqueta.idProduto;";

			$db = new Conexao();
			$dados = mysqli_query($db->getConection(),$sql); 
	       
	       if($json){	  

	        while($row = $dados->fetch_array(MYSQLI_ASSOC)) { $myArray[] = $row; }

 			return json_encode($myArray);

	       }else{	    
    			return $dados;
	       }
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