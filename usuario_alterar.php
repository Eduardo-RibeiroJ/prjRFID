<?php

include_once "Model/Conexao.php";
include_once "Model/Usuario.php";
include_once "Controller/UsuarioController.php";


$conn = new Conexao();
$usuario = new Usuario();

if (isset($_POST['btnAlterar'])) {

	$conn = new Conexao();
	$usuario = new Usuario();

	$usuario->setIdUsuario($_POST['idUsuario']);
	$usuario->setSenha($_POST['senha_atual']);
	$usuario->setEmail($_POST['email']);

	if(UsuarioController::ConferirSenha($usuario) == FALSE) {

		echo "<script>window.alert('Senha errada!'); history.go(-1); </script>";
		die;
	}

	if(!empty($_POST['senha']) && ($_POST['senha'] != $_POST['senha_confirmacao'])) {
		echo "<script>window.alert('As senhas não conferem!'); history.go(-1); </script>";
		die;
	}

	if($_POST['senha'] == $_POST['senha_confirmacao']) {

		$usuario->setIdUsuario($_POST['idUsuario']);
		$usuario->setSenha($_POST['senha']);

		$usuarioController = new UsuarioController($conn);
		$usuarioController->MudarSenha($usuario);

		echo "<script> alert('Senha alterada com sucesso!'); window.location.replace('usuario_listar.php'); </script>";

	}
} else { //Aqui puxa os valores do banco de dados para os campos correspondentes

	$usuario->setIdUsuario($_GET['idUsuario']);
	$user = new UsuarioController($conn);
	$query = $user->Listar($usuario);
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
							<h1>Alterar Senha</h1>
						</header>
						<center>
							<table border=0>
								<tr>
									<td>
										<form action="usuario_alterar.php" method="post">

											<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $reg['idUsuario']; ?>" />
											<input type="hidden" name="email" id="email" value="<?php echo $reg['email']; ?>" />
											
											<p>
												<h2>Nome do usuário: <?= $reg['nomeUsuario']; ?></h2>
											</p> 

											<p>
												<label for="senha_atual">Senha atual</label>
												<input type="password" placeholder="Insira a senha atual..."  name="senha_atual" id="senha_atual" required />
											</p> 


											<p>
												<label for="senha">Nova senha</label>
												<input type="password" placeholder="Insira a nova senha..."  name="senha" id="senha" required />
											</p> 

											<p>
												<label for="senha_confirmacao">Repita a nova senha</label>
												<input type="password" placeholder="Repita a nova senha..."  name="senha_confirmacao" id="senha_confirmacao" required />
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