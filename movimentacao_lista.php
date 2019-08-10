<?php
include_once "Model/Conexao.php";
include_once "Controller/MovimentacaoController.php";

if (isset($_GET['idContrato']) && isset($_GET['acao'])) {

	MovimentacaoController::deletarMovimentacao($_GET['idContrato']);
	
	echo "<script> alert('Movimentação deletada!'); window.location.replace('movimentacao_lista.php'); </script>";
}
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
								<div class="col-12">
									<h1>Movimentações</h1>
								</div>
							</div>
						</header>
						<center>
							<table border=0>
								<tr>
									<th>N° Contrato</th>
									<th>Total de Itens</th>
									<th>Hora da Saída</th>
									<th>Hora da Entrada</th>
									<th></th>
								</tr>

								<?php $dados = MovimentacaoController::getMovimentacao(); ?>
								<?php if($dados): ?>
									<?php while ($linha = mysqli_fetch_array($dados)): ?>
										
										<tr>
											<td> <?= $linha["idContrato"]; ?> </td>
											<td> <?= $linha["total"]; ?> </td>
											<td> <?= $linha['horaSaida']; ?> </td>
											<td> <?= $linha['horaEntrada'] != NULL ? $linha['horaEntrada'] : 'Não retornou'; ?> </td>

											<center>
												<td> <a href="movimentacao_produto_lista.php?status=<?= $linha["status"]; ?>&idContrato=<?= $linha["idContrato"]; ?>">Ver Produtos</a></td>
											</center>

										</tr>

									<?php endwhile; ?>
								<?php endif; ?>

							</table>
						</center>
					</section>

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php include 'footer.php'; ?>
