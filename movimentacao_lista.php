<?php 

include_once "Model\Conexao.php";
include_once "Controller\MovimentacaoController.php";

if(isset($_GET['idContrato']) && isset($_GET['acao'])) { 

		echo "<script> alert('Movimentaçães deletada!'); window.location.replace('movimentacao_lista.php'); </script>";
	 
}

include_once 'header.php';

?>

					<!-- Conteúdo -->
								<section>
									<header class="main">
										<div class="row">
											<div class="col-12">
												<h1>Movimentações</h1>
											</div> 
										</div>
									</header>
									<center>
										<table border=0>
											<tr>
												<td>N° Contrato</td>
												<td>Total de Produto</td>
												<td>Situação</td>
												<td> </td>
												<td> </td>
											</tr>

											
												<?php  
												 $dados = MovimentacaoController::getMovimentacao(); 
												 while($linha = mysqli_fetch_array($dados)){
												 ?>
												<td> <?=$linha["idContrato"];?> </td> 
												<td> <?=$linha["total"];?> </td> 
												<td> <?=$linha["status"];?> </td> 
												
												<center>
													<td> <a href="#">Editar</a> </td>
													<td> <a href="?acao=excluir&idContrato=1">Apagar</a> </td>
												</center>

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