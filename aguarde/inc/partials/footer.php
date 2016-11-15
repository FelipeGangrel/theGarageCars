	<footer>

		<div class="linha1">
			<div class="container w1170">
				<div class="row">

					<div class="col-md-6 col-md-push-6 formularios">
						<h3>Contato</h3>
						<form action="<? echo SITE ?>e-contato.php" method="post" id="formContato" data-toggle="validator">
							<div class="row slim">
								<div class="form-group col-sm-6">
									<input type="text" name="nome" class="form-control" placeholder="Nome" required>
								</div>
								<div class="form-group col-sm-6">
									<input type="text" name="sobrenome" class="form-control" placeholder="Sobrenome" required>
								</div>
							</div>

							<div class="row slim">
								<div class="form-group col-sm-6">
									<input type="email" name="email" class="form-control" placeholder="Email" required>
								</div>
								<div class="form-group col-sm-6">
									<input type="text" name="telefone" data-mask="telefone" class="form-control" placeholder="Telefone" required>
								</div>
							</div>

							<div class="row slim">
								<div class="form-group col-sm-12">
									<textarea name="mensagem" rows="5" class="form-control" placeholder="Mensagem" required></textarea>
								</div>
							</div>

							<div class="row" style="padding-top: 15px;">
								<div class="form-group col-sm-12">
									<div id="recaptchaMensagem"></div>
								</div>
							</div>

							<div class="row slim">
								<div class="form-group col-sm-12 rodape">
									<button class="btn btn-success btn-padrao" type="submit">Enviar mensagem</button>
								</div>
							</div>
						</form>

						<h4>Cadastre e fique por dentro</h4>
						<form action="<? echo SITE ?>e-mailing.php" method="post">
							<div class="row slim">
								<div class="form-group col-sm-6">
									<input type="text" name="nome" class="form-control" placeholder="Nome">
								</div>
								<div class="form-group col-sm-6">
									<input type="text" name="sobrenome" class="form-control" placeholder="Sobrenome">
								</div>
							</div>

							<div class="row slim">
								<div class="form-group col-sm-6">
									<input type="email" name="email" class="form-control" placeholder="Email">
								</div>
								<div class="form-group col-sm-6">
									<input type="text" name="telefone" data-mask="telefone" class="form-control" placeholder="Whatsapp">
								</div>
							</div>

							<div class="row" style="padding-top: 15px;">
								<div class="form-group col-sm-12">
									<div id="recaptchaMailing"></div>
								</div>
							</div>

							<div class="row slim">
								<div class="form-group col-sm-12 rodape">
									<button class="btn btn-success btn-padrao" type="submit">Enviar cadastro</button>
								</div>
							</div>
						</form>

					</div>

					<div class="col-md-6 col-md-pull-6 menus hidden-sm hidden-xs">
						<div class="row">

							<div class="col-sm-6">

								<div class="menu">
									<h5>A Diocese</h5>
									<ul class="list-unstyled">
										<li><a href="<? echo SITE ?>institucional/">Institucional</a></li>
										<li><a href="<? echo SITE ?>clero/">O clero</a></li>
										<li><a href="<? echo SITE ?>mitra-diocesana/">Mitra Diocesana</a></li>
										<li><a href="<? echo SITE ?>secretaria/">Secretaria Diocesana</a></li>
										<li><a href="<? echo SITE ?>padroeiro/">Padroeiro</a></li>
									</ul>
								</div>

								<div class="menu">
									<h5>Diocese em Ação</h5>
									<ul class="list-unstyled">
										<li><a href="<? echo SITE ?>eventos/">Eventos da diocese</a></li>
										<li><a href="<? echo SITE ?>pastorais/">Pastorais e movimentos</a></li>
									</ul>
								</div>

								<div class="menu">
									<h5>Multimídia</h5>
									<ul class="list-unstyled">
										<li><a href="<? echo SITE ?>fotos/">Galeria de fotos</a></li>
										<li><a href="<? echo SITE ?>videos/">Galeria de vídeos</a></li>
									</ul>
								</div>
								
							</div>

							<div class="col-sm-6">

								<div class="menu">
									<h5>Espiritualidade</h5>
									<ul class="list-unstyled">
										<li><a href="<? echo SITE ?>palavra-bispo/">Palavra do bispo</a></li>
										<li><a href="<? echo SITE ?>reflexoes/">Reflexões</a></li>
										<li><a href="http://liturgiadiaria.cnbb.org.br/app/user/user/UserView.php">Liturgia do dia</a></li>
										<li><a href="<? echo SITE ?>santo-do-dia/">Santo do dia</a></li>
										<li><a href="<? echo SITE ?>pedidos/">Pedidos de oração</a></li>
									</ul>

									<h5>Notícias</h5>
									<ul class="list-unstyled">
										<li><a href="<? echo SITE ?>noticias/">Todas as Notícias</a></li>
										<li><a href="<? echo SITE ?>noticias/cat/1/diocese">Notícias da diocese</a></li>
										<li><a href="<? echo SITE ?>noticias/cat/2/igreja">Notícias da igreja</a></li>
										<li><a href="<? echo SITE ?>noticias/cat/3/paroquias">Notícias das paróquias</a></li>
									</ul>

									<h5>Paróquias</h5>
									<ul class="list-unstyled">
										<li><a href="<? echo SITE ?>paroquias/">Nossas paróquias</a></li>
										<li><a href="<? echo SITE ?>missas/">Horários das missas</a></li>
										<li><a href="<? echo SITE ?>comunidades/">Comunidades</a></li>
										<li><a href="<? echo SITE ?>institutos/">Institutos religiosos</a></li>
										<li><a href="<? echo SITE ?>seminarios/">Seminários</a></li>
									</ul>

								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="linha2">
			Desenvolvido por <a href="http://www.fococomunicacao.com/">Foco Comunicação</a>
		</div>

	</footer>

	<script src="<? echo SITE ?>js/GridColumnCarousel.js"></script>
	<script src="<? echo SITE ?>js/global.min.js"></script>
	
	
</body>
</html>