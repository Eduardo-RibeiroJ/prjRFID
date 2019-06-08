<?php

include_once "Model/Conexao.php";

class MovimentacaoController { 

	public static function getMovimentacao(){
		
			 $sql = "select count(tbItenscontrato.idContrato) as total, tbContrato.* from tbContrato
					inner join tbItenscontrato on tbContrato.idContrato = tbItenscontrato.idContrato
					group by tbContrato.idContrato order by tbItenscontrato.horaSaida DESC";

			$db = new Conexao();
			$dados = mysqli_query($db->getConection(),$sql); 
	       
	        return $dados;
   }

	public static function getProdutosByMovimentacao($idContrato,$json = false){
		
			 $sql = "select  * from tbProduto
					inner join tbEtiqueta on tbEtiqueta.idProduto = tbProduto.idProduto
					inner join tbItenscontrato on tbItenscontrato.rfidProduto = tbEtiqueta.rfid
					inner join tbContrato on tbContrato.idContrato = tbItenscontrato.idContrato
					where tbContrato.idContrato = '".$idContrato."' ";


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
		
			 $sql = "select tbEtiqueta.rfid, tbProduto.nomeProd from tbTemp 
						inner join tbEtiqueta on tbEtiqueta.rfid = tbTemp.etiqueta
						inner join tbProduto on tbProduto.idProduto = tbEtiqueta.idProduto;";

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

				$sql = "DELETE FROM tbEtiqueta  WHERE rfid = '".$rfid."'";

				$db = new Conexao();
				$dados = mysqli_query($db->getConection(),$sql); 

				return true;
				
			} catch (Exception $e) { } 
		} 

		return false;
   }
   

	public static function movimentacao($status, $idContrato){

		if(!empty($status) && !empty($idContrato) )
		{

			$db = new Conexao();

			//PEGA TODOS OS TEMPORARIOS
 			$sql_temp = "select  * from  tbTemp";
			$dados_temp = mysqli_query($db->getConection(),$sql_temp);  


			//SAIDA////////////////
			if($status == 'S')				
			{//CRIA O CONTRATO
				$sql_contrato = 'INSERT INTO tbContrato (idContrato, status) values ("'.$idContrato.'", "'.$status.'")';
			    mysqli_query($db->getConection(),$sql_contrato);   

			//CRIA OS ITENS DO CONTRATO
			while($row = $dados_temp->fetch_array(MYSQLI_ASSOC)) { 

	        	$sql = 'INSERT INTO tbItenscontrato (idContrato, rfidProduto, horaSaida) values ("'.$idContrato.'", "'.$row['etiqueta'].'", "'.date("Y-m-d H:i:s").'")';
			    mysqli_query($db->getConection(),$sql);

	       } 

	        //ENTRADA///////////////
			}else{

			//ATAULIZA O CONTRATO
			$sql_contrato = 'UPDATE tbContrato SET status = "E" where  idContrato = "'.$idContrato.'" ';
		    mysqli_query($db->getConection(),$sql_contrato);  

				//ATAULIZA OS ITENS DO CONTRATO
				while($row = $dados_temp->fetch_array(MYSQLI_ASSOC)) { 

					$sql_item = 'UPDATE tbItenscontrato SET horaEntrada = "'.date("Y-m-d H:i:s").'" where = rfidProduto"'.$row['etiqueta'].'" ';
				}  
	        
			}  


 
				//APAGA OS TEMP
				$sql_temp = "TRUNCATE TABLE tbTemp";

				$db = new Conexao();
				$dados = mysqli_query($db->getConection(),$sql_temp); 
   		}

	}

}
