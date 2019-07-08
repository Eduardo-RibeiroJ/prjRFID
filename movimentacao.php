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
							<h1>Movimentação</h1>
						</header>
						<center>
							<table border=0>
								<tr>
									
									<td>
										<form method="POST" action="movimentacao_iniciar_saida.php">
											<center>
											<p><b>SAÍDAS</b></p>
											<p>Número do Contrato <br>
												<input type="text" name="idContrato" id="idContrato" required="">
											</p>
											<input type="submit" name="btnIniciarSaida" id="btnIniciarSaida" value="Iniciar Saídas">
											</center>
										</form>
									</td>
									<td>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</td>
									<td>
										<form method="POST" action="movimentacao_iniciar_entrada.php">
											<center>
											<p><b>ENTRADAS</b></p>
											<p>Número do Contrato <br>
												<input type="text" name="idContrato" id="idContrato" required="">
											</p>
											<input type="submit" name="btnIniciarEntrada" id="btnIniciarEntrada" value="Iniciar Entradas">
											</center>
										</form>
									</td>
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
