<?php
include_once "Model/Conexao.php";
include_once "Controller/MovimentacaoController.php";

$idContrato = $_POST['idContrato'];
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
									<h3>Iniciar Entrada Contrato <?php echo $idContrato; ?></h3>
								</div>
								<div class="col-4">
									<a class="button" href="movimentacao_finalizar.php?status=E&idContrato=<?php echo $idContrato; ?>">FINALIZAR</a>
								</div>
							</div>
						</header>
							<div>
								<table border=1>
									<tr>
										<td><strong>Quantidade de Itens a Retornar</strong></td>
										<td><strong>Quantidade de Itens Retornados</strong></td>
										<td> </td>
									</tr>
									<tr>
										<?php
										$quantidade = MovimentacaoController::verificaQuantidadeProdutos($idContrato);
										?>
										<td><strong> <?= $quantidade; ?> </strong></td>
										<td id="itens"> </td>
										<td> </td>
									</tr>

								</table>
							</div>

							<h3>Itens a Retornar</h3>
						<center>
							<table border=1>
									<tr>
										<td>ID</td>
										<td>Produto</td>
										<td>RFID</td>
									</tr>


									<?php
									$dados = MovimentacaoController::getProdutosByMovimentacao($idContrato);
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
						</center>
					</section>

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php $jsExtra = 'movimentacao'; ?>
<?php include 'footer.php'; ?>
