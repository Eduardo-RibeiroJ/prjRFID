<?php include_once 'header_login.php'; ?>
<!-- html-->
	<!-- body -->
		<!-- wrapper -->
			<!-- main -->
				<!-- inner -->
					<!-- Conteúdo -->					
					<section>
						<div class="row">
							<div class="col-6 off-3 align-center">

								<span class="image object">
									<img src="images/pic10.jpg" alt="" />
								</span>

								<p><strong>Acesso</strong> Sistema de Gestão de Estoque</p>
						 
								<form action="index.php" method="post">

									<input type="hidden" name="acao" value="login">

									<p>
										<label for="login">Login</label>
										<input type="email" placeholder="Insira o seu e-mail" required="required" name="login" id="login" />
									</p>  
									<p>
										<label for="senha">Senha</label>
										<input type="password" placeholder="Insira a senha" required="required" name="senha" id="senha" />
									</p>  

									<p>
										<input type="submit" name="btnInserir" id="btnInserir" value="Entrar" />
									</p>
								</form>
							</div>
						</div>			 
 
					</section>
				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->

				<div class="row">
					<div class="col-12 align-center">
						<footer id="footer">
							<p class="copyright">&copy; Parque Tecnológico de Sorocaba.</p>
						</footer>
					</div>
				</div>
	<!-- body -->
<!-- html--> 