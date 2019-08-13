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
						
						<form action="movimentacao_finalizar.php" method="GET">
							<header class="main">
								<div class="row">
									<div class="col-8">
										<h2>Iniciar Entrada Contrato <?php echo $_GET['idContrato'] ?></h2>
									</div>
									<div class="col-4">
										<input type="submit" value="FINALIZAR" />
									</div>
								</div>
							</header>

							<div class="row">
								<div class="col-8">
									<h3>Informe o motivo pela diferença de itens do contrato</h3>
									<textarea type="text" name="obs" placeholder="Digite o motivo..." required="required" minlength="10" resize="none" autofocus></textarea>
								</div>
							</div>

							<input name="idContrato" type="hidden" value="<?php echo $_GET['idContrato']; ?>" />
							<input name="status" type="hidden" value="O" />
							
						</form>
					</section>

						<h3>Itens não retornados</h3>
						<table border=1>
							<tr>
								<th>ID</th>
								<th>Produto</th>
								<th>RFID</th>
							</tr>

							<?php $dados = MovimentacaoController::getProdutosNaoRetornados(false, $_GET['idContrato']); ?>
							<?php while ($linha = mysqli_fetch_array($dados)): ?>

							<tr>
								<td> <?= $linha["idProduto"]; ?> </td>
								<td> <?= $linha["nomeProd"]; ?> </td>
								<td> <?= $linha["rfid"]; ?> </td>
							</tr>

							<?php endwhile; ?>
						</table>

				<?php endif; ?>

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php $jsExtra = 'movimentacao'; ?>
<?php include 'footer.php'; ?>
