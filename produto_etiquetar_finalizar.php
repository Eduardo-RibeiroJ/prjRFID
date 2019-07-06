<?php 
	include_once "Model/Conexao.php";
	include_once "Controller/EtiquetaController.php";
?>

<?php include_once 'header.php'; ?>
<!-- html-->
	<!-- body -->
		<!-- wrapper -->
			<!-- main -->
				<!-- inner -->

				<?php if(!empty($_GET['idProduto']) ): ?>

					<?php EtiquetaController::etiquetar($_GET['idProduto']); ?>

					<!-- Conteúdo -->
					<section>
						<header class="main">
							<div class="row">
								<div class="col-12 text-center center">
									<h3>Etiquetagem Realizada com Sucesso</h3>
								</div> 
								<div class="col-12">
									<a class="button" href="etiquetas_lista.php">Etiquetas</a>
									</div>
							</div>
						</header>
						<center> 
						</center>
					</section>
				<?php endif; ?>

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php $jsExtra = 'movimentacao'; ?>
<?php include 'footer.php'; ?>
