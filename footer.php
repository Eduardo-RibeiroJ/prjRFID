<!-- html-->
	<!-- body -->
		<!-- wrapper -->
			<!-- main -->
				<!-- inner -->
				</div>
			</div>

			<div id="sidebar">
				<div class="inner">
					<!-- Menu -->
					<nav id="menu">
						<header class="major">
							<h2>Menu</h2>
						</header>
						<ul>
							<li>
								<a href="index.php">Home</a>
							</li>
							<li>
								<span class="opener">Movimentações</span>
								<ul>
									<li><a href="movimentacao.php">Iniciar Movimentação</a></li>
									<li><a href="movimentacao_lista.php">Listar Movimentações</a></li>
									
								</ul>
							</li>

							<li>
								<a href="produto_listar.php">Produtos</a>									
							</li>
							<li>
								<span class="opener">Etiquetas</span>	
								<ul>
									<li><a href="etiquetas_identificar.php">Identificar Etiquetas</a></li>
								</ul>									
							</li>
							<li>
								<a href="usuario_listar.php">Usuários</a>											
							</li>
							<!-- PODEMOS DEIXAR PARA UMA SEGUNDA ETAPA
							<li>
								<span class="opener">Relatórios</span>
								<ul>
									<li><a href="#">Geral do Estoque</a></li>
									<li><a href="#">Por Movimentação</a></li>
									<li><a href="#">Por Data</a></li>
								</ul>
							</li> -->
						</ul>
					</nav>

					<!-- Sessão sobre endereço do suporte e outras informações -->
					<section>
						<header class="major">
							<h2>Suporte</h2>
						</header>
						<p>Quaisquer dúvidas na operação do sistema, entre em contato conosco:</p>
						<ul class="contact">
							<li class="fa-envelope-o"><a href="#">Coworking Grupo 5</a></li>
							<li class="fa-phone">(000) 000-0000</li>
							<li class="fa-home">Avenida Itavuvu, 11777<br />
							Sorocaba, SP - 18100-000</li>
						</ul>
					</section>

					<!-- Rodapé da barra lateral -->
					<footer id="footer">
						<p class="copyright">&copy; Parque Tecnológico de Sorocaba.</p>
					</footer>
					
					<!-- Scripts -->
					<script src="assets/js/jquery.min.js"></script>
					<script src="assets/js/browser.min.js"></script>
					<script src="assets/js/breakpoints.min.js"></script>
					<script src="assets/js/util.js"></script>
					<script src="assets/js/main.js"></script>
					
					<!-- SCRIPITS CONDICIONAIS -->
					<?php if(isset($jsExtra) && $jsExtra === 'movimentacao') : ?>
					<script src="assets/js/movimentacao.js"></script>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</body>
</html>
