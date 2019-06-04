<?php 

include_once "Model\Conexao.php";
include_once "Model\Produto.php";
include_once "Controller\DaoProduto.php";

  $cn = new Conexao();
  $cp = new Produto();

 if(isset($_POST['btnInserir'])){ 

 	$cp->atualizarProduto(
    $_GET['idProduto'],
    $_POST['nomeProd'],
    $_POST['personalizado'] = ( isset($_POST['personalizado']) ) ? 1 : 0,
    $_POST['cor'],
    $_POST['obs'],
    $_POST['quantTotal']); 

   $daoProd = new DaoProduto($cn);

   $daoProd->Atualizar($cp);
  //	echo "<script> alert('Produto Atualizado!'); window.location.replace('produtos_lista.php'); </script>";




 }else{

  $cp->setIdProduto($_GET['idProduto']); 
  $daoProd = new DaoProduto($cn);
  $query = $daoProd->listarProdutos($cp); 
  $reg = $query->fetch_array();



 }
 
 

?>

<?php include 'header.php'; ?>

					<!-- Conteúdo -->
						<section>
							<header class="main">
								<h1>Editar Produto</h1>
							</header>
							<center>
								<table border=0>
									<tr>
										<td>
											<form action="produto_editar.php?idProduto=<?php echo $_GET['idProduto']; ?>" method="post">

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
												            <input type="text"  required="required" name="quantTotal" id="quantTotal" min="0"  step="1"  value="<?php echo $reg['quantTotal']; ?>"/>
												        </p>

												        <p>
												            <input type="submit" name="btnInserir" id="btnInserir" value="Editar" />
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