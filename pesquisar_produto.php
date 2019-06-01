<?php 

include_once "Model\Conexao.php";
include_once "Model\Produto.php";
include_once "Controller\DaoProduto.php";

?>

<?php include 'header.php'; ?>

					<!-- Conteúdo -->
								<section>
									<header class="main">
										<h1>Listar Produtos</h1>
									</header>
									<center>
										<table border=0>
											<tr>
												<td>ID Produto</td>
												<td>Nome Produto</td>
												<td>Personalizado</td>
												<td>Cor</td>
												<td>Observações</td>
												<td>Quantidade Total</td>
												<td>Quantidade Disponível</td>
												<td> </td>
												<td> </td>
											</tr>

											<?php
												$cn = new Conexao();
												$cp = new Produto();
												$daoProd = new DaoProduto($cn);
												$query = $daoProd->listarProdutos($cp);
												while($reg = $query->fetch_array()) {
											?>
											<tr>
												<td> <?=$reg["idProduto"];?> </td>
												<td> <?=$reg["nomeProd"];?> </td>		
												<td> <?=$reg["personalizado"];?> </td>		
												<td> <?=$reg["cor"];?> </td>		
												<td> <?=$reg["obs"];?> </td>		
												<td> <?=$reg["quantTotal"];?> </td>		
												<td> <?=$reg["quantDisponivel"];?> </td>
												
												<center>
													<td> <a href="atualizar_produto.php?ID=<?=$reg["idProduto"];?>">Editar</a> </td>
													<td> <a href="apagar_produto.php?ID=<?=$reg["idProduto"];?>">Apagar</a> </td>
												</center>

											</tr>
												
											<?php 

											}

											?>

											<tr>


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