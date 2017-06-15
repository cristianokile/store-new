<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="divider"></div>		
		</div>
	</div>
</div>
<div class="loja-produtos">
	<div class="container">
		<div class="row">

			<?php // CONSULTA ?>
			
			<?php require("controller/config.inc.php"); ?>

			<?php 

			// Verifica qual tipo de parametro é recebido para realizar a busca
			if(isset($_GET['categoria'])) {
				$categoria = $_GET['categoria'];
				$consulta = $mysqli_conn->query("SELECT * FROM produtos_lista WHERE produto_categoria = '" . $categoria . "'"); 
			} else {	
				$consulta = "";
			};  $produtos_lista = "";?>

			
			<?php // Retorno da informação de acordo com a checagem acima
			if($consulta->num_rows === 0){ ?>

				<form class="form-item">
					<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
        					<div class="col-md-12 text-center">
								<h2>Você buscou por "<?php echo $categoria; ?>"</h2>
							</div>
							<p>Não foram encontrados produtos cadastrados nesta categoria!</p>
						</div>
					</article>
				</form>

			<?php } else {?>
				
				
				<div class="col-md-8 col-md-offset-2 text-center">
					<h2 class="heading-title"><?php echo $categoria; ?></h2>
				</div>

				<form class="form-item">
					<div class="col-md-8 col-md-offset-2">
						<div class="row">
							<?php while($row = $consulta->fetch_assoc()){ 
								$produtos_lista .= <<<EOT
								<article class="col-md-4 col-sm-6 col-xs-12">
									<a href="produto.php?categoria={$row['produto_categoria']}&produto={$row['produto_titulo']}&cod={$row['produto_codigo']}"" title="{$row['produto_titulo']}">
										<figure class="produto-01">
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
							echo $produtos_lista; ?>
						</div>
					</div>
				</form>
			<?php } ?>

		<?php // CONSULTA ?>

			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="botao-mais-produtos">
					<a href="catalogo-categoria.php" title="Mais Produtos">
						MAIS PRODUTOS
						<span class="glyphicon glyphicon-chevron-down"></span>
					</a>
				</div>	
			</div>
					
				
		</div>
	</div>
</div>