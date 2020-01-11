<?php 

include_once "Model/Conexao.php";
include_once "Model/Usuario.php";
include_once "Controller/UsuarioController.php";

$conn = new Conexao();
$usuario = new Usuario();

if(isset($_GET['apagar']) && isset($_GET['idUsuario'])) {

	$usuario->setIdUsuario($_GET["idUsuario"]);
	$uController = new UsuarioController($conn);
	$uController->Apagar($usuario);

	echo "<script> alert('Usuário removido!'); window.location.replace('usuario_listar.php'); </script>";
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
									<h1>Usuários</h1>
								</div>
								<div class="col-4">
									<a class="button" href="usuario_inserir.php">INSERIR NOVO USUÁRIO</a>
									</div>
							</div>
						</header>
						<center>
							<table>
								<tr>
									<th>ID</th>
									<th>Nome</th>
									<th>E-mail</th>
									<th>Nível</th>
									<th></th>
									<th></th>
								</tr>

								<?php
									$conn = new Conexao();
									$usuario = new Usuario();
									$uController = new UsuarioController($conn);
									$query = $uController->Listar($usuario);
								?>
								<?php while($reg = $query->fetch_array()): ?>

								<tr>
									<td> <?= $reg["idUsuario"];?> </td>
									<td> <?= $reg["nomeUsuario"];?> </td>
									<td> <?= $reg["email"];?> </td>
									<td> <?= $reg['nivel'] == '1' ? 'Administrador' : 'Colaborador' ?> </td>
									
									<center>
										<td> <a href="usuario_alterar.php?idUsuario=<?=$reg["idUsuario"];?>">Alterar Senha</a> </td>
										<td> <a href="?idUsuario=<?=$reg["idUsuario"];?>&apagar=1">Apagar</a> </td>
									</center>
								</tr>
									
								<?php endwhile; ?>

							</table>
						</center>
					</section>

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php include 'footer.php'; ?>