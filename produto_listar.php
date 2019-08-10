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
									<h1>Produtos</h1>
								</div>
								<div class="col-4">
									<a class="button" href="produto_inserir.php">Inserir Novo Produto</a>
									</div>
							</div>
						</header>
						<center>
							<table>
								<tr>
									<th>ID Produto</th>
									<th>Nome Produto</th>
									<th>Personalizado</th>
									<th>Cor</th>
									<th>Quantidade Total</th>
									<th>Quantidade Disponível</th>
									<th> </th>
									<th> </th>
									<th> </th>
								</tr>

								<?php
									$cn = new Conexao();
									$cp = new Produto();
									$pc = new ProdutoController($cn);
									$query = $pc->Listar($cp);

								?>
								<?php while($reg = $query->fetch_array()): ?>

								<tr>
									<td> <?= $reg["idProduto"];?> </td>
									<td> <?= $reg["nomeProd"];?> </td>		
									<td> <?= $reg['personalizado'] == '1' ? 'Sim' : 'Não' ?> </td>
									<td> <?= $reg["cor"];?> </td>			
									<td> <?= $reg["quantTotal"];?> </td>		
									<td> <?= $reg["quantDisponivel"];?> </td>
									
									<center>
										<td> <a href="produto_alterar.php?idProduto=<?=$reg["idProduto"];?>">Alterar</a> </td>
										<td> <a href="?idProduto=<?=$reg["idProduto"];?>&apagar=1">Apagar</a> </td>
										<td> <a href="produto_etiquetar.php?idProduto=<?=$reg["idProduto"];?>">Etiquetar</a> </td>
									</center>
								</tr>
									
								<?php endwhile; ?>

							</table>
						</center>
					</section>

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php include 'footer.php'; ?>