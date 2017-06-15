<div class="carousel carousel-destaque">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<h2 class="heading-title">DESTAQUES</h2>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="row">

					<?php 

						// SEÇÃO DE CONSULTA

						include("controller/config.inc.php");
						setlocale(LC_MONETARY,"pt_BR"); 

						$consulta = $mysqli_conn->query("SELECT * FROM produtos_lista WHERE produto_destaque = '1'");
						$lista_produtos = "";

						// /SEÇÃO DE CONSULTA
					?>					
					
					<div class="owl-carousel owl-theme carousel-list col-md-12" style="position: relative;">
							<?php while($row = $consulta->fetch_assoc()) { 
								$lista_produtos .= <<<EOT
									<article class="item">
										<a href="produto.php?categoria={$row['produto_categoria']}&produto={$row['produto_titulo']}&cod={$row['produto_codigo']}" title="{$row['produto_titulo']}">
											<figure class="{$row['produto_titulo']}">
												<img src="img/identidade/loading.gif" class="img-responsive lazy" data-original="img/uploads/produtos/{$row['produto_categoria']}/240x240/{$row['produto_imagem']}" alt="{$row['produto_titulo']}" title="{$row['produto_titulo']}">
											</figure>
											<div class="produto-info">
												<h2><strong>{$row['produto_titulo']}</strong></h2>
												<h3>R$ {$row['produto_preco']}</h3>
											</div>
										</a>
									</article>
EOT;
							};
						 	echo $lista_produtos; ?>

					</div>
				</div>
			</div>
		</div>	
	</div>	
</div>
<script>
	$(document).ready(function() {
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			navigation : true,
			loop: true,
			autoplay: true,
			autoplayTimeout: 4000,
			autoplayHoverPause: true,
			lazyLoad:true,
			margin:15,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 3,
					nav: false
				},
				1000: {
					items: 3,
					nav: false,
					margin: 20
				}
			}
		});
	})
</script>

