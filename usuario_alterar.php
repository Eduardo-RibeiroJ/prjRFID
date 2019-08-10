<?php

include_once "Model/Conexao.php";
include_once "Model/Usuario.php";
include_once "Controller/UsuarioController.php";


$conn = new Conexao();
$usuario = new Usuario();

if (isset($_POST['btnAlterar'])) {


	if(!empty($_POST['senha']) && ($_POST['senha'] != $_POST['senha_confirmacao'])) {
		echo "<script>window.alert('As senhas não conferem'); history.go(-1); </script>";
		die;

	}elseif($_POST['senha'] == $_POST['senha_confirmacao']){

		$usuario->inserirUsuario(
		$_POST['nome'],
		$_POST['email'],
		$_POST['senha'],
		$_POST['nivel']
		);

	}else{	

		$usuario->setIdUsuario($_POST['idUsuario']);
		$user = new UsuarioController($conn);
		$query = $user->Listar($usuario);
		$reg = $query->fetch_array();	


		$usuario->inserirUsuario(
		$_POST['nome'],
		$_POST['email'],
		$reg['senha'],
		$_POST['nivel']
		);
	}

	$uController = new UsuarioController($conn);
	$uController->Atualizar($usuario);
	echo "<script> alert('Usuário Atualizado!'); window.location.replace('usuario_listar.php'); </script>";

	
} else {  

 
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
							<h1>Alterar Usuário</h1>
						</header>
						<center>
							<table border=0>
								<tr>
									<td>
										<form action="usuario_alterar.php" method="post">

													<input type="hidden" disabled name="idUsuario" id="idUsuario" value="<?php echo $reg['idUsuario']; ?>" />
											

											<p>
												<label for="nome">Nome</label>
												<input type="text" placeholder="Insira o nome..." required="" name="nome" id="nome" value="<?php echo $reg['nomeUsuario']; ?>" />
											</p> 


											<p>
												<label for="email">E-mail (Login)</label>
												<input type="email" placeholder="Insira o nome do produto..." required="required" name="email" id="email"  value="<?php echo $reg['email']; ?>" />
											</p> 


											<p>
												<label for="senha">Nova Senha</label>
												<input type="password" placeholder="Insira a senha..."  name="senha" id="senha" />
											</p> 

											<p>
												<label for="senha_confirmacao">Repita Nova Senha</label>
												<input type="password" placeholder="Repita a senha..."  name="senha_confirmacao" id="senha_confirmacao" />
											</p> 

											<p>
												<label for="nivel">Nível</label>
												<select name="nivel">
													<option value="0" <?php echo ($reg['nivel'] == 0) ? 'selected' : ''; ?> >Colaborador</option>
													<option value="1" <?php echo ($reg['nivel'] == 1) ? 'selected' : ''; ?> >Administrador</option>
												</select>
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