<?php 

include_once "Model\Conexao.php";
include_once "Model\Contrato.php";
include_once 'header.php'
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
												<td>Situação</td>
												<td> </td>
												<td> </td>
											</tr>

											<?php 
											?>
											<tr>
												<td>  ---  </td>
												<td>  --- </td>		
												
												<center>
													<td> <a href="movimentacao_editar.php?idProduto=1">Editar</a> </td>
													<td> <a href="?acao=excluir&idContrato=1">Apagar</a> </td>
												</center>

											</tr>
												
											<?php  

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