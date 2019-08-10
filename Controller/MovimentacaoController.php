<?php

include_once "Model/Conexao.php";

class MovimentacaoController { 

	public static function getMovimentacao(){
		
			 $sql = "select count(tbItenscontrato.idContrato) as total, tbContrato.* from tbContrato
					inner join tbItenscontrato on tbContrato.idContrato = tbItenscontrato.idContrato
					group by tbContrato.idContrato";

			$db = new Conexao();
			$dados = mysqli_query($db->getConection(),$sql); 
	       
	        return $dados;
   }

	public static function getProdutosByMovimentacao($idContrato, $json = false) {

			$sql = "select DISTINCT tbproduto.idProduto, tbproduto.nomeProd,
					count(DISTINCT tbEtiqueta.rfid) as quantidade
					from tbProduto
					inner join tbEtiqueta on tbEtiqueta.idProduto = tbProduto.idProduto 
					inner join tbItensContrato on tbItensContrato.rfidProduto = tbEtiqueta.rfid
					inner join tbContrato on tbContrato.idContrato = tbItensContrato.idContrato
					where tbContrato.idContrato = '".$idContrato."'
		            group by tbproduto.idProduto;";
 

			$db = new Conexao();
			$dados = mysqli_query($db->getConection(), $sql);
	       
		    if($json){	       	

		    	while($row = $dados->fetch_array(MYSQLI_ASSOC)) { $myArray[] = $row; }

	 			return json_encode($myArray);

		    } else {	    
	    		return $dados;
		    }
	}

	public static function getTemp($json = false){
		
			 $sql = "select distinct tbEtiqueta.rfid, tbProduto.nomeProd, tbProduto.idProduto from tbTemp 
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

   public static function getTempContrato($json = false, $id_contrato){ //Pegar os itens da TEMP vinculados com um contrato
		
			 $sql = "select distinct tbEtiqueta.rfid, tbProduto.nomeProd, tbProduto.idProduto from tbTemp 
						inner join tbEtiqueta on tbEtiqueta.rfid = tbTemp.etiqueta
						inner join tbProduto on tbProduto.idProduto = tbEtiqueta.idProduto
                        inner join tbitenscontrato on tbitenscontrato.rfidProduto = tbTemp.etiqueta
						where idContrato = ".$id_contrato.";";

			$db = new Conexao();
			$dados = mysqli_query($db->getConection(),$sql); 
	       
	       if($json){	  

	        while($row = $dados->fetch_array(MYSQLI_ASSOC)) { $myArray[] = $row; }

 			return json_encode($myArray);

	       }else{	    
    			return $dados;
	       }
   }

   	public static function getProdutosNaoRetornados($json = false, $id_contrato){ //Pegar os itens da TEMP vinculados com um contrato
		
			$sql = "select distinct tbEtiqueta.rfid, tbProduto.nomeProd, tbProduto.idProduto from tbitenscontrato
						inner join tbEtiqueta on tbEtiqueta.rfid = tbitenscontrato.rfidProduto
						inner join tbProduto on tbProduto.idProduto = tbEtiqueta.idProduto
                        WHERE idContrato = ".$id_contrato." AND tbEtiqueta.rfid NOT IN
                        (select distinct tbEtiqueta.rfid from tbTemp 
						inner join tbEtiqueta on tbEtiqueta.rfid = tbTemp.etiqueta
						inner join tbProduto on tbProduto.idProduto = tbEtiqueta.idProduto);";

			$db = new Conexao();
			$dados = mysqli_query($db->getConection(),$sql); 
	       
	       	if($json){	  

	        while($row = $dados->fetch_array(MYSQLI_ASSOC)) { $myArray[] = $row; }

 			return json_encode($myArray);

	       	} else {	    
    			return $dados;
	       	}
   	}

   	public static function getProdutosNaoRetornadosByContrato($id_contrato){ //Pegar os itens nao retornados pelo contrato
		
			$sql = "select distinct tbProduto.nomeProd, tbproduto.idProduto, tbEtiqueta.rfid from tbitenscontrato
						inner join tbEtiqueta on tbEtiqueta.rfid = tbitenscontrato.rfidProduto
						inner join tbProduto on tbProduto.idProduto = tbEtiqueta.idProduto
						where tbitenscontrato.idContrato = ".$id_contrato." AND tbitenscontrato.retornado = 'N';";

			$db = new Conexao();
			$dados = mysqli_query($db->getConection(), $sql);
	        
    		return $dados;

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
			$itensRetornados = mysqli_query($db->getConection(),$sql);

			return mysqli_num_rows($itensRetornados);
	}

	public static function verificaContrato($id_contrato){

			$sql = "select idContrato, status from tbContrato
					where  idContrato = ".$id_contrato.";";

			$db = new Conexao();
			$contrato = mysqli_query($db->getConection(), $sql);

			return $contrato;
	}
	
   	public static function getProdutosRetorno($idContrato, $json) {

	$sql = "select DISTINCT tbproduto.idProduto, tbproduto.nomeProd,
			count(DISTINCT tbEtiqueta.rfid) as enviados, count(DISTINCT tbTemp.etiqueta) as retornados
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

   public static function deletarRFIDTemp($rfid) {

		$sql = "DELETE FROM tbTemp  WHERE etiqueta = $rfid";

		$db = new Conexao();
		mysqli_query($db->getConection(),$sql); 

   }

   public static function deletarProdTemp($produto) {
		try {

			$sql = "DELETE tbtemp FROM tbtemp LEFT JOIN tbetiqueta on tbetiqueta.rfid = tbtemp.etiqueta WHERE tbetiqueta.idProduto = $produto";
	
			$db = new Conexao();
			mysqli_query($db->getConection(), $sql); 
			return mysqli_affected_rows($db->getConection());

		} catch (Exception $e) {
			return false;
		} 
   }

	public static function deletarMovimentacao($idContrato) {

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
   

	public static function movimentacao($status, $idContrato, $obs) {

		if(!empty($status) && !empty($idContrato))
		{
			$db = new Conexao();

			//PEGA TODOS OS TEMPORARIOS
 			$sql_temp = "select  * from  tbTemp";
			$dados_temp = mysqli_query($db->getConection(), $sql_temp);

			if($status == 'S') // Saida		
			{//CRIA O CONTRATO
				$sql_contrato = 'INSERT INTO tbContrato (idContrato, status, horaSaida) values ("'.$idContrato.'", "'.$status.'", "'.date("Y-m-d H:i:s").'")';
			    mysqli_query($db->getConection(), $sql_contrato);   

				//CRIA OS ITENS DO CONTRATO
				while($row = $dados_temp->fetch_array(MYSQLI_ASSOC)) { 

		        	$sql = 'INSERT INTO tbItensContrato (idContrato, rfidProduto, retornado) values ("'.$idContrato.'", "'.$row['etiqueta'].'", "S")';
				    mysqli_query($db->getConection(), $sql);
		       	} 
			}

			if($status == 'E' || $status == 'O') // Entrada do contrato
			{
				//ATUALIZA O CONTRATO
				$sql_contrato = 'UPDATE tbContrato SET status = "E" where  idContrato = "'.$idContrato.'" ';
			    mysqli_query($db->getConection(), $sql_contrato);  

				//ATUALIZA OS ITENS DO CONTRATO
				while($row = $dados_temp->fetch_array(MYSQLI_ASSOC)) {
					$sql_item = 'UPDATE tbContrato SET horaEntrada = "'.date("Y-m-d H:i:s").'" where idContrato = "'.$idContrato.'";';
					mysqli_query($db->getConection(), $sql_item);
				}
			}

			if($status == 'O') // Inserção dos itens que não voltaram
			{
				$itensNaoRetornados = MovimentacaoController::getProdutosNaoRetornados(false, $idContrato);

				while($row = $itensNaoRetornados->fetch_array(MYSQLI_ASSOC)) { //Update para os itens que não retornaram

					$sql_item = 'UPDATE tbItenscontrato SET retornado = "N" where  idContrato = "'.$idContrato.'" AND rfidProduto = "'.$row['rfid'].'";';
					mysqli_query($db->getConection(), $sql_item);
				}

				//Colocando a observação no contrato
				$sql = 'UPDATE tbContrato SET obs = "'.$obs.'" where idContrato = "'.$idContrato.'" ';
			    mysqli_query($db->getConection(), $sql);

			}

			//APAGA A TEMP
			$sql_temp = "TRUNCATE TABLE tbTemp";
			$db = new Conexao();
			$dados = mysqli_query($db->getConection(), $sql_temp); 
   		}

	}

}
