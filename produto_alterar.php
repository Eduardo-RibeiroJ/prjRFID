<?php

include_once "Model/Conexao.php";
include_once "Model/Produto.php";
include_once "Controller/ProdutoController.php";

$cn = new Conexao();
$cp = new Produto();

if (isset($_POST['btnAlterar'])) {

	$cp->atualizarProduto(
		$_GET['idProduto'],
		$_POST['nomeProd'],
		$_POST['personalizado'] = (isset($_POST['personalizado'])) ? 1 : 0,
		$_POST['cor'],
		$_POST['obs'],
		$_POST['quantTotal']
	);

	$pc = new ProdutoController($cn);
	$pc->Atualizar($cp);
	echo "<script> alert('Produto Alterado!'); window.location.replace('produto_listar.php'); </script>";
} else { //Aqui puxa os valores do banco de dados para os campos correspondentes

	$cp->setIdProduto($_GET['idProduto']);
	$pc = new ProdutoController($cn);
	$query = $pc->Listar($cp);
	$reg = $query->fetch_array();
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
							<h1>Alterar Produto</h1>
						</header>
						<center>
							<table border=0>
								<tr>
									<td>
										<form action="produto_alterar.php?idProduto=<?php echo $_GET['idProduto']; ?>" method="post">

											<p>
													<label for="idProd">ID do Produto<label>
													<input type="text" disabled name="idProd" id="idProd" value="<?php echo $reg['idProduto']; ?>" />
											</p>

											<p>
													<label for="nomeProd">Nome do Produto</label>
													<input type="text" placeholder="Insira o nome do produto..." required="required" name="nomeProd" id="nomeProd" value="<?php echo $reg['nomeProd']; ?>" />
											</p>

												<p>
													<label for="personalizado">Produto Personalizado?</label>
													<input type="checkbox" name="personalizado" value="1" <?php echo (($reg['personalizado'] ) ? 'checked' : '') ?> >
												</p>

												<p>
													<label for="cor">Cor</label>
													<select name="cor">
														<?php

														$cores = ['Preto','Branco','Azul','Vermelho','Verde','Marrom','Amarelo','Rosa'];

														foreach ($cores as   $value)
														{

															if($value == $reg['cor'])
																$selected = 'selected';
															else
																$selected = '';

															echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';

														}
														?>
													</select>
												</p>

												<p>
													<label for="obs">Observação</label>
													<input type="text" placeholder="Insira uma observação..." name="obs" id="obs"  value="<?php echo $reg['obs']; ?>"/>
												</p>

												<p>
													<label for="quantTotal">Quantidade</label>
													<input type="number"  required="required" name="quantTotal" id="quantTotal" min="0" step="1" pattern="[0-9]"value="<?php echo $reg['quantTotal']; ?>"/>
												</p>

												<p>
													<input type="submit" name="btnAlterar" id="btnAlterar" value="Alterar" />
												</p>
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