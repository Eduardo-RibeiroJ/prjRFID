<?php 

include_once "Model\Conexao.php";
include_once "Controller\EtiquetaController.php";


if(isset($_GET['rfid']) && isset($_GET['acao'])) {
	if(EtiquetaController::deletarEtiquetas($_GET['rfid'])){
		echo "<script> alert('Etiqueta deletada!'); window.location.replace('etiquetas_lista.php'); </script>";
	}
}

include_once 'header.php'
?>

					<!-- Conteúdo -->
								<section>
									<header class="main">
										<div class="row">
											<div class="col-8">
												<h1>Listar Etiquetas</h1>
											</div>
											<div class="col-4">
												<a class="button" href="etiqueta_vincular.php" >Vincular Produto</a>
										    </div>
										</div>
									</header>
									<center>
										<table border=0>
											<tr>
												<td>RFID</td>
												<td>Nome Produto</td>
												<td> </td>
												<td> </td>
											</tr>
											<tr>
												<?php  
												 $dados = EtiquetaController::getEtiquetas(); 
												 while($linha = mysqli_fetch_array($dados)){
												 ?>
												<td> <?=$linha["rfid"];?> </td>
												<td> <?=$linha["nomeProd"];?> </td>	
												
												<center>
													<td> <a href="etiqueta_editar.php?rfid=<?=$linha["rfid"];?>">Editar</a> </td>
													<td> <a href="?acao=1&rfid=<?=$linha["rfid"];?>">Apagar</a> </td>
												</center>

											</tr>												
											<?php  } ?>
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