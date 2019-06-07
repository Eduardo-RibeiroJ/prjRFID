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
												<a class="button" href="movimentacao_finalizar.php?status=S&idContrato=<?php echo $idContrato; ?>">FINALIZAR</a>
										    </div>
										</div>
									</header>
									<center>
										<table border='1'  >
											<thead>
											<tr>
												<td><strong>Rfid</strong></td>
												<td><strong>Produto</strong></td>
												<td> </td>
											</tr> 
											</thead> 
										<tbody border='1' id="tabela">
											  
										</tbody>
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
	     <script src="assets/js/movimentacao.js"></script>

	</body>
</html>