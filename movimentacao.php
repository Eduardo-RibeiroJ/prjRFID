<?php include 'header.php' ?>

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
														<input type="submit" name="enviar" value="Iniciar Saídas">
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
														<input type="submit" name="enviar" value="Iniciar Entradas">
														</center>
													</form>
												</td>
											</tr>
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

	</body>
</html>