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

					<!-- Conteúdo -->
					<section>
						<header class="main">
							<div class="row">
								<div class="col-8">
									<h1>Itens do Contrato <?php echo $_GET['idContrato']; ?></h1>
									<h3>Status: <?php echo ($_GET['status'] == 'S') ? 'Saída' : 'Entrada'; ?></h3>
								</div>
								<div class="col-4">
									<a class="button" href="movimentacao_lista.php">VOLTAR</a>
								</div>
							</div>
						</header>
						<center>
							<div>
								<h2>Itens do Contrato</h2>
								<table>
									<tr>
										<th>ID</th>
										<th>Produto</th>
										<th>Quantidade</th>
									</tr>
		
									<?php $dados = MovimentacaoController::getProdutosByMovimentacao($_GET['idContrato']); ?>
									<?php while ($linha = mysqli_fetch_array($dados)): ?>

										<tr>
											<td> <?= $linha["idProduto"]; ?> </td>
											<td> <?= $linha["nomeProd"]; ?> </td>
											<td> <?= $linha["quantidade"]; ?> </td>
										</tr>

									<?php endwhile; ?>
								</table>
							</div>

							<div>								
								
								<?php $dadosItensNaoRetornados = MovimentacaoController::getProdutosNaoRetornadosByContrato($_GET['idContrato']); ?>
								<?php if(mysqli_num_rows($dadosItensNaoRetornados) > 0): ?>
										
									<h2 class="text-left" >Itens não Retornados</h2>
									<table>
										<tr>
											<th>ID</th>
											<th>Produto</th>
											<th>Etiqueta</th>
										</tr>

										<?php while ($linha = mysqli_fetch_array($dadosItensNaoRetornados)): ?>

										<tr>
											<td> <?= $linha["idProduto"]; ?> </td>
											<td> <?= $linha["nomeProd"]; ?> </td>
											<td> <?= $linha["rfid"]; ?> </td>
										</tr>

										<?php endwhile; ?>
										<?php
										$dadosContrato = MovimentacaoController::verificaContrato($_GET['idContrato']);
										$linha = mysqli_fetch_array($dadosContrato);
										?>
									

									</table>									
										
									<h4>Motivo: <?= $linha['obs']; ?></h4>	
										
									<?php endif; ?>
									
							</div>
						</center>
					</section>

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php include 'footer.php'; ?>
