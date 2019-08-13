<?php
include_once "Model/Conexao.php";
include_once "Controller/MovimentacaoController.php";
include_once "Controller/EtiquetaController.php";


if(isset($_GET['excluir'])) {
		EtiquetaController::deletarEtiquetaTemp($_GET['excluir']);
	}
	else {
		MovimentacaoController::apagarTemp();
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
									<h1>Identificar Etiquetas</h1>
								</div>
								<div class="col-4">
									<a class="button" href="etiquetas_identificar.php">LIMPAR</a>
								</div>
							</div>
						</header>
						<center>
							<table>
								<tr>
									<th>Etiqueta RFID</th>
									<th></th>
								</tr>
								
								<tbody border="0" id="tabetiquetas">

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
