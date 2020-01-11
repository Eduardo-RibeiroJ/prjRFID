<?php 
include_once "Model/Conexao.php";
include_once "Controller/EtiquetaController.php";

if(isset($_GET['rfid']) && isset($_GET['acao']) && isset($_GET['idProduto']) && isset($_GET['nomeProd'])) {
	EtiquetaController::deletarEtiquetas($_GET['rfid']);
	echo "<script> alert('Etiqueta removida!'); </script>";
}

$idProduto = $_GET["idProduto"];
$nomeProd = $_GET["nomeProd"];

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
									<h1>Visualizar Etiquetas</h1>
								</div>

								<div class="col-4">
									<a class="button" href="produto_listar.php">VOLTAR</a>
								</div>
							</div>
						</header>

							<div class="col-12">
								<table>
									<tr>
										<th>Nome do Produto</th>
										<th>ID do Produto</th>
									</tr>
									<tr>
										<td><?= $nomeProd; ?></td>
										<td><?= $idProduto; ?></td>
									</tr>
								</table>
							</div>

							<table>
								<tr>
									<th>Etiquetas</th>
									<th> </th>
								</tr>

								<?php $dados = EtiquetaController::getEtiquetasByProduto($idProduto); ?>
								<?php while ($reg = mysqli_fetch_array($dados)): ?>
									<tr>
										<td> <?= $reg["rfid"];?> </td>

										<center>
											<td> <a href="?acao=1&rfid=<?= $reg["rfid"]; ?>&idProduto=<?= $idProduto; ?>&nomeProd=<?= $nomeProd; ?>">Remover</a> </td>
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
