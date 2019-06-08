<?php
include_once "Model/Conexao.php";
include_once "Controller/MovimentacaoController.php";

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
									<h3>Iniciar Entrada Contrato <?php echo $idContrato; ?></h3>
								</div>
								<div class="col-4">
									<a class="button" href="movimentacao_finalizar.php?status=E&idContrato=<?php echo $idContrato; ?>">FINALIZAR</a>
								</div>
							</div>
						</header>
						<center>
							<table border="1">
								<thead>
									<tr>
										<td><strong>Rfid</strong></td>
										<td><strong>Produto</strong></td>
										<td> </td>
									</tr>
								</thead>
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
