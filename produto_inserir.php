<?php 

include_once "Model\Conexao.php";
include_once "Model\Produto.php";
include_once "Controller\ProdutoController.php";

$cn = new Conexao();
$cp = new Produto();

if(isset($_POST['btnInserir'])) {

	$cp->inserirProduto (
		$_POST['txtNomeProduto'],
    	$_POST['ckbPersonalizado'] = ( isset($_POST['ckbPersonalizado']) ) ? 1 : 0,
    	$_POST['cbbCor'],
    	$_POST['txtObs'],
    	$_POST['txtQuantidadeTotal']
    );

  $pc = new ProdutoController($cn);
  $pc->Inserir($cp);
  	echo "<script> alert('Produto cadastrado!'); window.location.replace('produto_listar.php'); </script>";
}


include_once "header.php";
?>

					<!-- Conteúdo -->
						<section>
							<header class="main">
								<h1>Inserir Produto</h1>
							</header>
							<center>
								<table border=0>
									<tr>
										<td>
											<form action="produto_inserir.php" method="post">

												<p>
												    <label for="txtNomeProduto">Nome do Produto</label>
												    <input type="text" placeholder="Insira o nome do produto..." required="required" name="txtNomeProduto" id="txtNomeProduto"/>
												</p>

												        <p>
												            <label for="ckbPersonalizado">Produto Personalizado?</label>
												            <input type="checkbox" name="ckbPersonalizado" value="1">
												        </p>

												        <p>
												            <label for="cbbCor">Cor</label>
												            <select name="cbbCor">
												              <option value="Preto">Preto</option>
												              <option value="Branco">Branco</option>
												              <option value="Azul">Azul</option>
												              <option value="Vermelho">Vermelho</option>
												              <option value="Verde">Verde</option>
												              <option value="Marrom">Marrom</option>
												              <option value="Amarelo">Amarelo</option>
												              <option value="Rosa">Rosa</option>
												            </select>
												        </p>

												        <p>
												            <label for="txtObs">Observação</label>
												            <input type="text" placeholder="Insira uma observação..." name="txtObs" id="txtObs"/>
												        </p>

												        <p>
												            <label for="txtQuantidadeTotal">Quantidade</label>
												            <input type="number" required="required" name="txtQuantidadeTotal" id="txtQuantidadeTotal" min="0" value="1" step="1" pattern="[0-9]"/>
												        </p>

												        <p>
												            <input type="submit" name="btnInserir" id="btnInserir" value="Inserir" />
												        </p>
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