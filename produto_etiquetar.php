<?php

include_once "Model/Conexao.php";
include_once "Model/Produto.php";
include_once "Controller/ProdutoController.php";

$cn = new Conexao();
$cp = new Produto();


	$cp->setIdProduto($_GET['idProduto']);
	$pc = new ProdutoController($cn);
	$query = $pc->Listar($cp);
	$reg = $query->fetch_array();

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
									<h3>Adicionar Etiquetas</h3>
								</div>
								<div class="col-4">
									<a class="button" href="produto_etiquetar_finalizar.php?idProduto=<?=$reg["idProduto"];?>">Salvar</a>
								</div>
							</div>
						</header>
						<center>

							<table>
								<tr>
									<td><strong>Nome do Produto</strong></td>
									<td><strong>ID do Produto</strong></td>
								</tr>
								<tr>
									<td><?php echo $reg['nomeProd']; ?></td>
									<td><?php echo $reg['idProduto']; ?></td>
								</tr>
							</table>

							<table border="1">
								<thead>
									<tr>
										<td><strong>Rfid</strong></td>
										<td><strong>Produto</strong></td>
										<td> </td>
									</tr>
								</thead>
								<tbody border="1" id="tabetiquetas">

								</tbody>
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
