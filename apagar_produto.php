<?php 

include_once "Model\Conexao.php";
include_once "Model\Produto.php";
include_once "Controller\DaoProduto.php";

if(isset($_GET['idProduto'])) {

	$cn = new Conexao();
	$cp = new Produto();

	$cp->setIdProduto($_GET["idProduto"]);
	$daoProd = new DaoProduto($cn);

	if($daoProd->apagarProduto($cp)) {
 		echo "<script> alert('Produto deletado!'); window.location.replace('produto_lista.php'); </script>";
 	}
}

?>