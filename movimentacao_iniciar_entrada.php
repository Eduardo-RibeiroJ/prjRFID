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

						<script type="text/javascript" src=assets/js/movimentacao.js></script>

						</header>
							<div>
								<table border=1>
									<tr>
										<td><strong>Quantidade Total de Itens a Retornar</strong></td>
										<td><strong>Quantidade Total de Itens Retornados</strong></td>
										<td><strong>Status</strong></td>
									</tr>
									<tr>
										<td class="quantItens" id="quant" height="50px"><strong> <?= MovimentacaoController::getQuantProdutosRetorno($idContrato, false, false); ?> </strong></td>
										<td class="quantItens" id="itens"> </td>
										<td id="status"><img id="imagem" class="bola" src="images/BolaVermelha.png"></td>
									</tr>

								</table>
							</div>

							<h3>Itens a Retornar</h3>
						<center>
							<table border=1>
									<tr>
										<td>ID</td>
										<td>Produto</td>
										<td>Quantidade</td>
										<td>Retornado</td>
									</tr>


									<?php
									$dados = MovimentacaoController::getProdutosRetorno($idContrato, false);
									while ($linha = mysqli_fetch_array($dados)) {
										?>
										<td> <?= $linha["idProduto"]; ?> </td>
										<td> <?= $linha["nomeProd"]; ?> </td>
										<td> <?= MovimentacaoController::getQuantProdutosRetorno($idContrato, $linha["idProduto"], false); ?> </td>
										<td> </td>
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
