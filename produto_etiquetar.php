<?php

include_once "Model/Conexao.php";
include_once "Model/Produto.php";
include_once "Controller/ProdutoController.php";
include_once "Controller/EtiquetaController.php";
include_once "Controller/MovimentacaoController.php";

$cn = new Conexao();
$cp = new Produto();


	$cp->setIdProduto($_GET['idProduto']);
	$pc = new ProdutoController($cn);
	$query = $pc->Listar($cp);
	$reg = $query->fetch_array();

	if(isset($_GET['excluir'])) {
		EtiquetaController::deletarEtiquetaTemp($_GET['excluir']);
	}
	else {
		MovimentacaoController::apagarTemp();
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
								<div class="col-8">
									<h1>Adicionar Etiquetas</h1>
								</div>
								<div class="col-4">
									<a class="button" href="produto_etiquetar_finalizar.php?idProduto=<?=$reg["idProduto"];?>">Salvar</a>
								</div>
							</div>
						</header>
						<center>

							<table>
								<tr>
									<th>Nome do Produto</th>
									<th>ID do Produto</th>
								</tr>
								<tr>
									<td><?= $reg['nomeProd']; ?></td>
									<td id="idProduto" data-idProduto="<?= $reg['idProduto']; ?>"> <?= $reg['idProduto']; ?></td>
								</tr>
							</table>

							<table>
									<tr>
										<th>Etiquetas</th>
										<th></th>
									</tr>
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
