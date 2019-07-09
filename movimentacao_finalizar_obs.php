<?php 
	include_once "Model/Conexao.php";
	include_once "Controller/MovimentacaoController.php";
?>

<?php include_once 'header.php'; ?>
<!-- html-->
	<!-- body -->
		<!-- wrapper -->
			<!-- main -->
				<!-- inner -->

				<?php if(!empty($_GET['status']) && !empty($_GET['idContrato']) ): ?>

					<!-- Conteúdo -->
					<section>
						<header class="main">
							<div class="row">
								<div class="col-6">
									<h3>Iniciar Entrada Contrato <?php echo $_GET['idContrato'] ?></h3>
								</div>

								<div class="col-4">
										<a class="button" href="movimentacao_finalizar.php?status=E&idContrato=<?php echo $_GET['idContrato']; ?>">FINALIZAR</a>
								</div>
								<div class="col-6">
									<h4>Informe o motivo pela diferença de itens do contrato</h4>
									<input type="text">
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
