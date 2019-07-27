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

	public static function getProdutosByMovimentacao($idContrato, $json = false){
		
			 $sql = "select * from tbProduto
					 inner join tbEtiqueta on tbEtiqueta.idProduto = tbProduto.idProduto 
					 inner join tbItensContrato on tbItensContrato.rfidProduto = tbEtiqueta.rfid inner
					  join tbContrato on tbContrato.idContrato = tbItensContrato.idContrato
					   where tbContrato.idContrato =  '".$idContrato."' ";
 

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
		
			 $sql = "select distinct tbEtiqueta.rfid, tbProduto.nomeProd from tbTemp 
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

   public static function getTempEtiquetas($json = false){
		
			 $sql = "select DISTINCT etiqueta from tbTemp;";

			$db = new Conexao();
			$dados = mysqli_query($db->getConection(),$sql); 
	       
	       if($json){	  

	        while($row = $dados->fetch_array(MYSQLI_ASSOC)) { $myArray[] = $row; }

 			return json_encode($myArray);

	       }else{	    
    			return $dados;
	       }
   }

   public static function verificaProdutos($json = false, $id_contrato = 0){

			$sql = "select DISTINCT etiqueta from tbTemp
					inner join tbitenscontrato on tbitenscontrato.rfidProduto = tbTemp.etiqueta
					where  idContrato = ".$id_contrato.";";


			$db = new Conexao();
			$dados = mysqli_query($db->getConection(),$sql);

			return mysqli_num_rows($dados);

   }

   	public static function getProdutosRetorno($idContrato, $json) {

	$sql = "select DISTINCT tbproduto.idProduto, tbproduto.nomeProd,
			count(tbEtiqueta.rfid) as enviados, count(tbTemp.etiqueta) as retornados
			from tbProduto
			inner join tbEtiqueta on tbEtiqueta.idProduto = tbProduto.idProduto 
			inner join tbItensContrato on tbItensContrato.rfidProduto = tbEtiqueta.rfid
			inner join tbContrato on tbContrato.idContrato = tbItensContrato.idContrato
			left join tbTemp on tbTemp.etiqueta = tbItensContrato.rfidProduto
			where tbContrato.idContrato = '".$idContrato."'
			group by tbproduto.idProduto";


			$db = new Conexao();
			$dados = mysqli_query($db->getConection(),$sql);


			if($json) {	  

	        	while($row = $dados->fetch_array(MYSQLI_ASSOC)) {
	        		$myArray[] = $row;
	        	}
 				return json_encode($myArray);

	       	} else {	    
    			return $dados;
	    	}

   	}

   	public static function getQuantProdutosRetorno($idContrato, $idProduto, $json){

			if($idProduto === false) {

				$sql = "select * from tbProduto
          			inner join tbEtiqueta on tbEtiqueta.idProduto = tbProduto.idProduto 
          			inner join tbItensContrato on tbItensContrato.rfidProduto = tbEtiqueta.rfid
          			inner join tbContrato on tbContrato.idContrato = tbItensContrato.idContrato
          			where tbContrato.idContrato = '".$idContrato."';";

          			$db = new Conexao();
					$dados = mysqli_query($db->getConection(),$sql);

					return mysqli_num_rows($dados);
			}

			else {

				$sql = "select tbproduto.idProduto from tbProduto
	          			inner join tbEtiqueta on tbEtiqueta.idProduto = tbProduto.idProduto 
	          			inner join tbItensContrato on tbItensContrato.rfidProduto = tbEtiqueta.rfid
	          			inner join tbContrato on tbContrato.idContrato = tbItensContrato.idContrato
	          			where tbContrato.idContrato = '".$idContrato."' AND tbProduto.idProduto = '".$idProduto."'";


				$db = new Conexao();
				$dados = mysqli_query($db->getConection(),$sql);


				if($json) {	  

		        	while($row = $dados->fetch_array(MYSQLI_ASSOC)) {
		        		$myArray[] = $row;
		        	}
	 				return json_encode($myArray);

		       	} else {

	    			return mysqli_num_rows($dados);
		    	}
		    }

   	}

   public static function deletarProdTemp($rfid) {

 

		$sql = "DELETE FROM tbTemp  WHERE etiqueta = '".$rfid."'";

		$db = new Conexao();
		mysqli_query($db->getConection(),$sql); 

   }

	public static function deletarMovimentacao($idContrato){

		if(!empty($idContrato))
		{
		   try {

				$sql = "DELETE FROM tbContrato  WHERE idContrato = '".$idContrato."'";

				$db = new Conexao();
				$dados = mysqli_query($db->getConection(),$sql); 

				$sql = "DELETE FROM tbitenscontrato  WHERE idContrato = '".$idContrato."'";

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

	        	$sql = 'INSERT INTO tbItensContrato (idContrato, rfidProduto, horaSaida) values ("'.$idContrato.'", "'.$row['etiqueta'].'", "'.date("Y-m-d H:i:s").'")';
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
