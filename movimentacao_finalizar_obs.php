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

								<form action="movimentacao_finalizar.php" method="GET">
									<div class="row">
										<div class="col-6">
											<h3>Iniciar Entrada Contrato <?php echo $_GET['idContrato'] ?></h3>
										</div>
										<div class="col-4">
											<input class="button" type="submit" value="FINALIZAR" />
										</div>

										<div class="col-6">
											<h4>Informe o motivo pela diferença de itens do contrato</h4>
											<textarea type="text" name="obs" placeholder="Digite a observação..." required="required" minlength="10"></textarea>
										</div>

										<input name="idContrato" type="hidden" value="<?php echo $_GET['idContrato']; ?>" />
										<input name="status" type="hidden" value="O" />

								</form>
							
									<div class="col-8">
										<h3>Itens não retornados:</h3>
										<table border=1>
											<tr>
												<td><strong>ID</strong></td>
												<td><strong>Produto</strong></td>
												<td><strong>RFID</strong></td>
											</tr>


											<?php
											$dados = MovimentacaoController::getProdutosNaoRetornados(false, $_GET['idContrato']);
											while ($linha = mysqli_fetch_array($dados)) {
												?>
												<td> <?= $linha["idProduto"]; ?> </td>
												<td> <?= $linha["nomeProd"]; ?> </td>
												<td> <?= $linha["rfid"]; ?> </td>

												</tr>

											<?php
											}
											?>
										</table>
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
