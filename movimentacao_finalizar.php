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

					<?php MovimentacaoController::movimentacao($_GET['status'], $_GET['idContrato'], $_GET['obs']); ?>

					<section>
						<header class="main">
							<div class="row">
								<div class="col-12 text-center center">
									<h2><?= ($_GET['status'] == 'S') ? 'Saída' : 'Entrada' ?> de estoque realizada com sucesso - Contrato <?= $_GET['idContrato'] ?></h2>
								</div> 
								<div class="col-12">
									<a class="button" href="movimentacao_produto_lista.php?status=<?=$_GET["status"];?>&idContrato=<?=$_GET["idContrato"];?>">VISUALIZAR PRODUTOS</a>
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
