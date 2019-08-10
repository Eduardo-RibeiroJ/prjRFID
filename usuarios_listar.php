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
									<h1>Usuários</h1>
								</div>
								<div class="col-4">
									<a class="button" href="usuario_inserir.php">Inserir Novo Usuario</a>
									</div>
							</div>
						</header>
						<center>
							<table>
								<tr>
									<th>ID</th>
									<th>Nome</th>
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
									<td> <?= $reg["idUsuario"];?> </td>
									<td> <?= $reg["nome"];?> </td>		
									
									<center>
										<td> <a href="usuario_alterar.php?idUsuario=<?=$reg["idUsuario"];?>">Alterar</a> </td>
										<td> <a href="?idUsuario=<?=$reg["idUsuario"];?>&apagar=1">Apagar</a> </td>
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