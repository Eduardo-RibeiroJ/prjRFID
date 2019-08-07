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
									<a class="button" onclick="confirmar()">FINALIZAR</a>
									
								</div>
							</div>

						

						</header>
							<div>
								<table border=1>
									<tr>
										<td><strong>Quantidade Total de Itens a Retornar</strong></td>
										<td><strong>Quantidade Total de Itens Retornados</strong></td>
										<td><strong>Status</strong></td>
									</tr>
									<tr>
										<td id="quant" class="quantItens" height="50px"><strong> <?= MovimentacaoController::getQuantProdutosRetorno($idContrato, false, false); ?> </strong></td>
										<td id="itensRetornados" class="quantItens"><strong></strong></td>
										<td id="status"><img id="imagem" class="bola" src="images/BolaVermelha.png"></td>
									</tr>

								</table>
							</div>

							<h3>Itens a Retornar</h3>
						<center>
							<table border=1 id="tbContrato" data-idContrato="<?php echo $idContrato; ?>">
									<tr>
										<td>ID</td>
										<td>Produto</td>
										<td>Quantidade</td>
										<td>Retornado</td>
										<td>Status</td>
									</tr>


									<?php
									$dados = MovimentacaoController::getProdutosRetorno($idContrato, false);
									while ($linha = mysqli_fetch_array($dados)) {
										?>
										<tr class="item-<?= $linha["idProduto"]; ?>">
											<td> <?= $linha["idProduto"]; ?> </td>
											<td> <?= $linha["nomeProd"]; ?> </td>
											<td class="quantidade"><?= $linha["enviados"]; ?> </td>
											<td class="retornados"><?= $linha["retornados"]; ?> </td>
											<td class="status"><img style="width: 20px" src="images/BolaVermelha.png"></td>
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


<script type="text/javascript">
	
function confirmar() {
	var val1 = document.getElementById("quant").innerText;
	var val2 = document.getElementById("itensRetornados").innerText;
	if(parseInt(val1) == parseInt(val2)) {
		window.location.replace("movimentacao_finalizar.php?status=E&idContrato=<?php echo $idContrato; ?>&obs=");
	}
	else {
		var confirmando = confirm("Deseja finalizar a entrada mesmo com a diferença de itens?");
		if(confirmando){
			window.location.replace("movimentacao_finalizar_obs.php?status=E&idContrato=<?php echo $idContrato; ?>");
		}
	}
}

</script>
