<?php 

/*
DADOS JSON DO CONTRATO

exemplo de url http://127.0.0.1/prjRFID/dadosProdutos.php?idContrato=45612&status=S

*/

include_once "Controller\MovimentacaoController.php";


if(isset($_GET['idContrato']) && isset($_GET['status'])){

	echo MovimentacaoController::getProdutosByMovimentacao($_GET['idContrato'], true);
}