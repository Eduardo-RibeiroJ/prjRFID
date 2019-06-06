<?php 

include_once "Model\Conexao.php";
include_once "Controller\MovimentacaoController.php";
include_once 'header.php';

?>

					<!-- Conteúdo -->
								<section>
									<header class="main">
										<div class="row">
											<div class="col-12">
												<h1>Produtos Contrato: <?php echo $_GET['idContrato']; ?></h1>
												<h3>Status: <?php echo ($_GET['status']=='S') ? 'Saída' : 'Entrada'; ?></h3>
											</div> 
										</div>
									</header>
									<center>
										<table border=0>
											<tr>
												<td>ID</td>
												<td>Produto</td>
												<td>RFID</td>
											</tr>

											
												<?php  
												 $dados = MovimentacaoController::getProdutosByMovimentacao($_GET['idContrato']); 
												 while($linha = mysqli_fetch_array($dados)){
												 ?>
												<td> <?=$linha["idProduto"];?> </td> 
												<td> <?=$linha["nomeProd"];?> </td> 
												<td> <?=$linha["rfid"];?> </td> 

											</tr>
												
											<?php 

											} 

											?>

											<tr>


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