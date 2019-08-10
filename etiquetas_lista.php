<?php 
include_once "Model/Conexao.php";
include_once "Controller/EtiquetaController.php";

if(isset($_GET['rfid']) && isset($_GET['acao'])) {
	if(EtiquetaController::deletarEtiquetas($_GET['rfid'])){
		echo "<script> alert('Etiqueta deletada!'); window.location.replace('etiquetas_lista.php'); </script>";
	}
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
									<h1>Etiquetas</h1>
								</div>
							</div>
						</header>
							<table>
								<tr>
									<th>RFID</th>
									<th>Nome Produto</th>
									<th> </th>
								</tr>

								<?php $dados = EtiquetaController::getEtiquetas(); ?>
								<?php while ($dados && $linha = mysqli_fetch_array($dados)): ?>
									<tr>
										<td> <?= $linha["rfid"]; ?> </td>
										<td> <?= $linha["nomeProd"]; ?> </td>
										<center>
											<td> <a href="?acao=1&rfid=<?= $linha["rfid"]; ?>">Apagar</a> </td>
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
