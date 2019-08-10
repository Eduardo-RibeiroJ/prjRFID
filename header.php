<?php 
session_start();

if(isset($_POST['acao']) && ($_POST['acao'] == 'login')){

include "Controller/UsuarioController.php";
 
	 if(UsuarioController::logar() == false) {
	    echo "<script>window.alert('Dados incorretos, tente novamente!'); history.go(-1);</script>";
		die;
	 }
}

if(empty($_SESSION['admin'])){
	 echo "<script>location.href='login.php'</script>";
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<!-- O bloco a seguir constroi o cabeçalho da página  -->
	<title>Estoque RFID</title>

	<!-- Define o idioma para UTF-8 (PT-Br)  -->
	<meta charset="utf-8" />

	<!-- Define a saída do dispositivo (Tela/viewport)  -->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

	<!-- Conecta com o arquivo CSS, responsável pela formatação e cores  -->
	<link rel="stylesheet" href="assets/css/main.css" />

	<!-- O bloco a seguir corrige uma falha de bullet no template/design. Não remover -->

	<style type"text/css"> <!-- li { list-style: none; } ul { list-style: none; } -->
	</style>

	<!-- ----------------------------------------------------------------------------- -->


</head>

<!-- Início da página  -->

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Main -->
		<div id="main">
			<div class="inner">

				<!-- Cabeçalho na parte superior de todas as páginas -->
				<header id="header">
					<div class="row">
						<div class="col-6">
							<a href="index.php" class="logo"><strong>Estoque</strong> RFID</a>
						</div>
						<div class="col-6 align-right logo">
							Bem vindo(a) <strong><?php echo $_SESSION['nomeUsuario']; ?></strong> - <a href="logout.php">Sair</a>
						</div>
				</header>

				<!-- Fim do Cabeçalho que irá em todas as páginas  -->