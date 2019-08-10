<?php
include_once "Model/Conexao.php";
include_once "Controller/MovimentacaoController.php";

if(isset($_GET['apagar']) && isset($_GET['rfid'])) {

	echo "<script> alert('Produto removido!'); </script>";
	deletarProdTemp($rfid);

	echo "<script> alert('Produto removido!'); </script>";
	return;
}

$idContrato = $_POST['idContrato'];


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
									<h2>Iniciar Saída do Contrato <?php echo $idContrato; ?></h2>
								</div>
								<div class="col-4">
									<a class="button" href="movimentacao_finalizar.php?status=S&idContrato=<?php echo $idContrato; ?>&obs=">FINALIZAR</a>
								</div>
							</div>
						</header>
						<center>
							<table>
								<tr>
									<th>ID</th>
									<th>Produto</th>
									<th>Quantidade</th>
									<th></th>
								</tr>
								
								<tbody border="1" id="tabela">
								</tbody>
							</table>
						</center>
					</section>

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php $jsExtra = 'movimentacao'; ?>
<?php include 'footer.php'; ?>
