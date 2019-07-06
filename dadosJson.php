<?php 


error_reporting(E_ERROR | E_WARNING | E_PARSE);

/* DADOS JSON DO CONTRATO */

include_once "Controller/MovimentacaoController.php";

include_once "Controller/EtiquetaController.php";



//LISTA DE PRODUTOS EM UM CONTRATO
//exemplo de url http://127.0.0.1/prjRFID/dadosProdutos.php?idContrato=45612&status=S
if(isset($_GET['idContrato']) && isset($_GET['status'])){

	echo MovimentacaoController::getProdutosByMovimentacao($_GET['idContrato'], true);
}

//TEMPORARIAS
//exemplo de url http://127.0.0.1/prjRFID/dadosProdutos.php?acao=temp
if(isset($_GET['acao']) && ($_GET['acao']=='temp')){
	
	echo MovimentacaoController::getTemp(true);

}

//TEMPORARIAS
//exemplo de url http://127.0.0.1/prjRFID/dadosProdutos.php?acao=temp
if(isset($_GET['acao']) && ($_GET['acao']=='tempetiquetas')){
	
	echo MovimentacaoController::getTempEtiquetas(true);

}


//JA VINCULADAS A PRODUTOS
//exemplo de url http://127.0.0.1/prjRFID/dadosProdutos.php?acao=etiquetas
if(isset($_GET['acao']) && ($_GET['acao']=='etiquetas')){
	
	echo EtiquetaController::getEtiquetas(0, true);

}


//VERIFICAR ENTRADA
if(isset($_GET['acao']) && ($_GET['acao']=='verificar')){
	
	echo MovimentacaoController::verificaProdutos(true);

}