<?php 

include_once "Model\Conexao.php";
include_once "Controller\MovimentacaoController.php";
include_once 'header.php';

$idContrato = $_POST['idContrato'];

?>

					<!-- Conteúdo -->
								<section>
									<header class="main">
										<div class="row">
											<div class="col-8">
												<h3>Iniciar Saída Contrato <?php echo $idContrato; ?></h3>
											</div> 
											<div class="col-4">
												<a class="button" href="#">FINALIZAR</a>
										    </div>
										</div>
									</header>
									<center>
										<table border=0>
											<tr>
												<td>Rfid</td>
												<td>Produto</td>
												<td> </td>
											</tr>
											<tr>
												<td> ----</td> 
												<td> ---- </td> 
												
												<center>
													<td> <a href="">Apagar</a> </td>
												</center>

											</tr>	
										</table>
									</center>
								</section>

						</div>
					</div>

					<?php include 'menu.php'; ?>

						</div>
					</div>

			</div>

		<?php include 'scripts.php'; ?>

	</body>
</html>