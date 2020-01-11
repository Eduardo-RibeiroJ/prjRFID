<?php 
include_once "Model/Conexao.php";
include_once "Model/Produto.php";
include_once "Controller/ProdutoController.php";

$conn = new Conexao();
$produto = new Produto();
$produtoController = new ProdutoController($conn);
$query = $produtoController->Listar($produto);

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
									<h1>Etiquetas</h1>
								</div>
							</div>
						</header>
							<table>
								<tr>
									<th>ID Produto</th>
									<th>Nome Produto</th>
									<th> </th>
								</tr>

								<?php while ($reg = mysqli_fetch_array($query)): ?>
									<tr>
										<td> <?= $reg["idProduto"];?> </td>
										<td> <?= $reg["nomeProd"];?> </td>

										<center>
											<td> <a href="etiquetas_listar.php?idProduto=<?= $reg["idProduto"]; ?>&nomeProd=<?= $reg["nomeProd"]; ?>">Visualizar Etiquetas</a> </td>
										</center>
									</tr>
								<?php endwhile; ?>
							</table>
					</section>

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php include 'footer.php'; ?>
