<?php 

include_once "Model\Conexao.php";
include_once "Controller\MovimentacaoController.php";
include_once 'header.php';

if(!empty($_GET['status']) && !empty($_GET['idContrato']) ) {



MovimentacaoController::movimentacao($_GET['status'],$_GET['idContrato']);

if($_GET['status'] == 'S'){
	$msg = '<h3>Saída de Estoque feita com sucesso Contrato n°:'.$_GET['idContrato'].'</h3>';
}else{
	$msg = '<h3>Entrada de Estoque feita com sucesso Contrato n°:'.$_GET['idContrato'].'</h3>';
}


?>

					<!-- Conteúdo -->
								<section>
									<header class="main">
										<div class="row">
											<div class="col-12 text-center center">
												<?php echo $msg ?>
												
											</div> 
											<div class="col-12">
												<a class="button" href="movimentacao_produto_lista.php?status=<?=$_GET["status"];?>&idContrato=<?=$_GET["idContrato"];?>">VIZUALIZAR PRODUTOS</a>
										    </div>
										</div>
									</header>
									<center> 
									</center>
								</section>

						</div>
					</div>

					<?php include 'menu.php'; ?>

						</div>
					</div>

			</div>

		<?php include 'scripts.php'; ?>

		
	     <script src="assets/js/movimentacao.js"></script>

	 <?php } ?>

	</body>
</html>
