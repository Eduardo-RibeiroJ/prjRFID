<?php 

include_once "Model\Conexao.php";
include_once "Model\Produto.php";
include_once "Controller\DaoProduto.php";

if(isset($_GET['idProduto']) && isset($_GET['acao'])) {

	$cn = new Conexao();
	$cp = new Produto();

	$cp->setIdProduto($_GET["idProduto"]);
	$daoProd = new DaoProduto($cn);

	if($daoProd->apagarProduto($cp)) {
 		echo "<script> alert('Produto deletado!'); window.location.replace('produtos_lista.php'); </script>";
 	}
}


include_once 'header.php'
?>

					<!-- Conteúdo -->
								<section>
									<header class="main">
										<div class="row">
											<div class="col-8">
												<h1>Listar Produtos</h1>
											</div>
											<div class="col-4">
												<a class="button" href="produto_inserir.php" >Inserir Novo Produto</a>
										    </div>
										</div>
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
													<td> <a href="produto_editar.php?idProduto=<?=$reg["idProduto"];?>">Editar</a> </td>
													<td> <a href="?acao=1&idProduto=<?=$reg["idProduto"];?>">Apagar</a> </td>
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