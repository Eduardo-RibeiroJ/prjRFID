<?php

include_once "Model/Conexao.php";
include_once "Model/Produto.php";
include_once "Controller/ProdutoController.php";

if (isset($_POST['btnInserir'])) { 
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
							<h1>Inserir Usuário</h1>
						</header>
						<center>
							<table border=0>
								<tr>
									<td>
										<form action="produto_inserir.php" method="post">

											<p>
												<label for="nome">Nome</label>
												<input type="text" placeholder="Insira o nome..." required="required" name="nome" id="nome" />
											</p> 


											<p>
												<label for="email">E-mail(Login)</label>
												<input type="email" placeholder="Insira o nome do produto..." required="required" name="email" id="email" />
											</p> 


											<p>
												<label for="senha">Senha</label>
												<input type="password" placeholder="Insira a senha..." required="required" name="senha" id="senha" />
											</p> 

											<p>
												<label for="senha_confirmacao">Repita Senha</label>
												<input type="password" placeholder="Repita a senha..." required="required" name="senha_confirmacao" id="senha_confirmacao" />
											</p> 

											<p>
												<label for="cbbCor">Nível</label>
												<select name="cbbCor">
													<option value="">Selecione</option>
													<option value="0">Administrador</option>
													<option value="1">Colaborador</option>
												</select>
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

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php include 'footer.php'; ?>