<nav class="navbar nav-principal navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="row" style="position: relative;">
			<div class="navbar-header col-md-4 col-sm-4">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<h1 class="h1-logo">
					<a class="navbar-brand" href="index.php" title="Página Inicial">RBC Global Business</a>
				</h1>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="navbar-header-right navbar-collapse col-md-6 col-sm-8 collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">
				<ul class="nav navbar-nav navbar-nav-main">
					<li><a href="index.php">HOME</a></li>
					<li><a href="quem-somos.php">QUEM SOMOS</a></li>
					<li class="">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORIA <span class="caret"></span></a>
						<ul class="dropdown-menu hidden-sm hidden-md hidden-lg">
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><h4>CATEGORIA 1<span class="caret"></span></h4></a>
								<ul class="dropdown-menu">
									<li>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><h4>Titulo 01<span class="caret"></span></h4></a>
										<ul class="dropdown-menu">
											<li><a href="#">Titulo 01</a></li>
											<li><a href="#">Titulo 02</a></li>
											<li><a href="#">Titulo 03</a></li>
										</ul>
									</li>
									<li>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><h4>Titulo 02<span class="caret"></span></h4></a>
										<ul class="dropdown-menu">
											<li><a href="#">Titulo 0</a></li>
											<li><a href="#">Titulo 0</a></li>
											<li><a href="#">Titulo 0</a></li>
										</ul>
									</li>
									<li><a href="#">Titulo 03</a></li>
									<li><a href="#">Titulo 04</a></li>
									<li><a href="#">Titulo 05</a></li>
									<li><a href="#">Titulo 06</a></li>
									<li><a href="#">Titulo 07</a></li>
									<li><a href="#">Titulo 08</a></li>
									<li><a href="#">Titulo 09</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><h4>CATEGORIA 2<span class="caret"></span></h4></a>
								<ul class="dropdown-menu">
									<li><a href="#">Titulo 01</a></li>
									<li><a href="#">Titulo 02</a></li>
									<li><a href="#">Titulo 03</a></li>
									<li><a href="#">Titulo 04</a></li>
									<li><a href="#">Titulo 05</a></li>
									<li><a href="#">Titulo 06</a></li>
									<li><a href="#">Titulo 07</a></li>
									<li><a href="#">Titulo 08</a></li>
									<li><a href="#">Titulo 09</a></li>
									<li>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><h4>Titulo 10<span class="caret"></span></h4></a>
										<ul class="dropdown-menu">
											<li><a href="#">Titulo 01</a></li>
											<li><a href="#">Titulo 02</a></li>
											<li><a href="#">Titulo 03</a></li>
											<li><a href="#">Titulo 04</a></li>
											<li><a href="#">Titulo 05</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="contato.php">CONTATO</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
			<?php require('inc/nav-carrinho.php') ?>
		</div><!-- /.container-fluid -->
	</div>
	<!-- NAVBAR FULLWIDTH -->
	<nav class="nav-fullwidth hidden-xs" style="display: none;">
		<ul>
			<li><a href="categoria.php?categoria=brincos" title="BRINCOS">BRINCOS</a></li>
			<li><a href="categoria.php?categoria=colares" title="COLARES">COLARES</a></li>
			<li><a href="categoria.php?categoria=pulseiras" title="PULSEIRAS">PULSEIRAS</a></li>
		</ul>
	</nav>
</nav>

<!-- SCRIPT DROPDOWN MENU -->
<script>
	$(document).ready(function() {
		$('.navbar a.dropdown-toggle').on('click', function(e) {
			var $el = $(this);
			var $parent = $(this).offsetParent(".dropdown-menu");
			$(this).parent("li").toggleClass('open');

			if(!$parent.parent().hasClass('nav')) {
				$el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
			}

			$('.nav li.open').not($(this).parents("li")).removeClass("open");

			return false;
		});
	});
</script>

