<?php 


error_reporting(E_ERROR | E_WARNING | E_PARSE);

/* DADOS JSON DO CONTRATO */

include_once "Controller/ProdutoController.php";

include_once "Controller/MovimentacaoController.php";

include_once "Controller/EtiquetaController.php";



//LISTA DE TODOS OS PRODUTOS
//exemplo de url http://127.0.0.1/prjRFID/dadosJson.php?acao=produtos&idProduto=1
if(isset($_GET['acao']) && $_GET['acao'] == 'produtos'){
	
	$idProduto = null;

	if(!empty($_GET['idProduto']))
		$idProduto = $_GET['idProduto'];

	echo ProdutoController::getProdutosJson($idProduto);
}

//LISTA DE PRODUTOS EM UM CONTRATO
//exemplo de url http://127.0.0.1/prjRFID/dadosJson.php?idContrato=45612&status=S
if(isset($_GET['idContrato']) && isset($_GET['status'])){

	echo MovimentacaoController::getProdutosByMovimentacao($_GET['idContrato'], true);
}

//TEMPORARIAS
//exemplo de url http://127.0.0.1/prjRFID/dadosJson.php?acao=temp
if(isset($_GET['acao']) && ($_GET['acao']=='temp')){
	
	echo MovimentacaoController::getTemp(true);
}


//TEMPORARIAS VINCULADAS COM UM CONTRATO
if(isset($_GET['acao']) && ($_GET['acao']=='tempContrato')){
	
	echo MovimentacaoController::getTempContrato(true, $_GET['id_contrato']);
}


//TEMPORARIAS
//exemplo de url http://127.0.0.1/prjRFID/dadosJson.php?acao=temp
if(isset($_GET['acao']) && ($_GET['acao']=='tempetiquetas')){
	
	echo MovimentacaoController::getTempEtiquetas(true);

}


//JA VINCULADAS A PRODUTOS
//exemplo de url http://127.0.0.1/prjRFID/dadosJson.php?acao=etiquetas
if(isset($_GET['acao']) && ($_GET['acao']=='etiquetas')){
	
	echo EtiquetaController::getEtiquetas(0, true);

}


//VERIFICAR ENTRADA
if(isset($_GET['acao']) && ($_GET['acao']=='verificar')){
	
	echo MovimentacaoController::verificaProdutos(true, $_GET['id_contrato']);

}

//Atualizar Status
if(isset($_GET['acao']) && ($_GET['acao']=='atualizarStatus')){
	
	echo MovimentacaoController::verificaProdutos(true, 0);

}

//Atualizar Retornados
if(isset($_GET['acao']) && ($_GET['acao']=='retornados')){
	
	echo MovimentacaoController::getProdutosRetorno( $_GET['id_contrato'], true);
	
}

//Apagar
if(isset($_GET['acao']) && ($_GET['acao']=='apagar')){
	echo MovimentacaoController::deletarRFIDTemp( $_GET['rfid']);
}

//Apagar
if(isset($_GET['acao']) && ($_GET['acao']=='apagarprod')){
	echo MovimentacaoController::deletarProdTemp( $_GET['rfid']);
}
