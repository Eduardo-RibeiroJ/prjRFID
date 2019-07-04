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
									<td>N° Contrato</td>
									<td>Total de Produto</td>
									<td>Situação</td>
									<td> </td>
									<!-- <td> </td> -->
									<!-- <td> </td> -->
								</tr>

								<?php $dados = MovimentacaoController::getMovimentacao(); ?>
								<?php while ($linha = mysqli_fetch_array($dados)): ?>

									<td> <?= $linha["idContrato"]; ?> </td>
									<td> <?= $linha["total"]; ?> </td>
									<td> <?= $linha["status"]; ?> </td>

									<center>
										<td> <a href="movimentacao_produto_lista.php?status=<?= $linha["status"]; ?>&idContrato=<?= $linha["idContrato"]; ?>">Ver Produtos</a> </td>
										<!-- <td> <a href="#">Editar</a> </td> -->
										<!-- <td> <a href="?acao=excluir&idContrato=1">Apagar</a> </td> -->
									</center>

									</tr>

								<?php endwhile; ?>
								<tr>

								</tr>
							</table>
						</center>
					</section>

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php include 'footer.php'; ?>
