<?php

include_once "Model/Conexao.php";
include_once "Model/Usuario.php";
include_once "Controller/UsuarioController.php";

if (isset($_POST['btnInserir'])) {


	if($_POST['senha'] != $_POST['senha_confirmacao']) {
		echo "<script>window.alert('As senhas não conferem'); history.go(-1); </script>";
		die;
	}
	$conn = new Conexao();
	$usuario = new Usuario();

	$usuario->inserirUsuario(
		$_POST['nome'],
		$_POST['email'],
		$_POST['senha'],
		$_POST['nivel']
	);

	$uController = new UsuarioController($conn);
	$uController->Inserir($usuario);
	echo "<script> alert('Usuário cadastrado!'); window.location.replace('usuario_listar.php'); </script>";



	
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
										<form action="usuario_inserir.php" method="post">

											<p>
												<label for="nome">Nome</label>
												<input type="text" placeholder="Insira o nome..." required="" name="nome" id="nome" autofocus/>
											</p> 


											<p>
												<label for="email">E-mail (Login)</label>
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
												<label for="nivel">Nível</label>
												<select name="nivel">
													<option value="0">Colaborador</option>
													<option value="1">Administrador</option>
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