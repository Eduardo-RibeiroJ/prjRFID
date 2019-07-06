<?php 

include_once "Model/Conexao.php";
include_once "Model/Produto.php";
include_once "Controller/ProdutoController.php";

$cn = new Conexao();
$cp = new Produto();

if(isset($_GET['apagar']) && isset($_GET['idProduto'])) {

	$cp->setIdProduto($_GET["idProduto"]);
	$pc = new ProdutoController($cn);
	$pc->Apagar($cp);

	echo "<script> alert('Produto deletado!'); window.location.replace('produto_listar.php'); </script>";
}
?>

<?php include_once 'header.php'; ?>
<!-- html-->
	<!-- body -->
		<!-- wrapper -->
			<!-- main -->
				<!-- inner -->

					<!-- Conteúdo -->
					<section>
						<header class="main">
							<div class="row">
								<div class="col-8">
									<h1>Listar Produtos</h1>
								</div>
								<div class="col-4">
									<a class="button" href="produto_inserir.php">Inserir Novo Produto</a>
									</div>
							</div>
						</header>
						<center>
							<table border=0>
								<tr>
									<td>ID Produto</td>
									<td>Nome Produto</td>
									<td>Personalizado</td>
									<td>Cor</td>
									<td>Observações</td>
									<td>Quantidade Total</td>
									<td>Quantidade Disponível</td>
									<td> </td>
									<td> </td>
									<td> </td>
								</tr>

								<?php
									$cn = new Conexao();
									$cp = new Produto();
									$pc = new ProdutoController($cn);
									$query = $pc->Listar($cp);
									while($reg = $query->fetch_array()) {
								?>

								<tr>
									<td> <?=$reg["idProduto"];?> </td>
									<td> <?=$reg["nomeProd"];?> </td>		
									<td> <?=$reg["personalizado"];?> </td>		
									<td> <?=$reg["cor"];?> </td>		
									<td> <?=$reg["obs"];?> </td>		
									<td> <?=$reg["quantTotal"];?> </td>		
									<td> <?=$reg["quantDisponivel"];?> </td>
									
									<center>
										<td> <a href="produto_alterar.php?idProduto=<?=$reg["idProduto"];?>">Alterar</a> </td>
										<td> <a href="?idProduto=<?=$reg["idProduto"];?>&apagar=1">Apagar</a> </td>
										<td> <a href="produto_etiquetar.php?idProduto=<?=$reg["idProduto"];?>">Etiquetar</a> </td>
									</center>
								</tr>
									
								<?php 

								}

								?>
							</table>
						</center>
					</section>

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php include 'footer.php'; ?>