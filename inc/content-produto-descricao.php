<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="divider"></div>
		</div>
	</div>
</div>
<form class="form-item">
	<div class="produto-descricao">
		<div class="container">

				<?php // CONSULTA ?>
				<?php 
					require("controller/config.inc.php"); 

					//List products from database
					if(isset($_GET['cod'])) {
						$produto_cod = $_GET['cod'];
						$consulta = $mysqli_conn->query("SELECT * FROM produtos_lista WHERE produto_codigo ='" . $produto_cod . "'"); ?>
							<?php $produtos_lista = "";?>

							<?php while($row = $consulta->fetch_assoc()) { 
								$produtos_lista .= <<<EOT
									<div class="row">
										<div class="col-md-4 produto-descricao-imagem">
											<figure>
												<img class="img-responsive" src="img/uploads/produtos/{$row['produto_categoria']}/640x640/{$row['produto_imagem']}" alt="{$row['produto_titulo']}">
											</figure>
											<a class="fancybox-effects-a" href="img/uploads/produtos/{$row['produto_categoria']}/640x640/{$row['produto_imagem_hd']}" title="{$row['produto_titulo']}"></a>
										</div>
										<div class="col-md-8 produto-descricao-info">
											<div class="descricao-breadcrumb">
												<ul class="list-style-none">
													<li><span class="glyphicon glyphicon-chevron-left"></span></li>
													<li><a href="#"><strong>VOLTAR</strong></a></li>
													<li>/</li>
													<li><a href="index.php">HOME</a></li>
													<li>/</li>
													<li><a href="categoria.php?categoria={$row['produto_categoria']}">{$row['produto_categoria']}</a></li>
												</ul>
											</div>
											<div class="descricao-titulo">
												<h1><strong>{$row['produto_titulo']}</strong></h1>
												<h2>R$ {$row['produto_preco']}</h2>
												<h3>4X DE R$ 00,00</h3>
											</div>
											<div class="descricao-info">
												<h4>DESCRIÇÃO</h4>
												<p>{$row['produto_descricao']}</p>
											</div>
											<div class="descricao-seletor">
												<div class="row">
													<div class="col-md-2">
														<span class="qtde">QUANTIDADE</span>		
													</div>
													<div class="col-md-3">
														<div class="form-group form-group-options center-block">
														<div id="id{$row['id']}" class="input-group input-group-option quantity-wrapper">
																<span class="input-group-addon input-group-addon-remove quantity-remove btn">
																	<span class="glyphicon glyphicon-minus"></span>
																</span>
																<input id="id{$row['id']}inp" type="text" value="1" name="produto_qtde" class="form-control quantity-count text-center" placeholder="1">
																<span class="input-group-addon input-group-addon-remove quantity-add btn">
																	<span class="glyphicon glyphicon-plus"></span>
																</span>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<input name="produto_codigo" type="hidden" value="{$row['produto_codigo']}">
														<input name="produto_titulo" type="hidden" value="{$row['produto_titulo']}">
														<input name="produto_categoria" type="hidden" value="{$row['produto_categoria']}">
														<input name="produto_preco" type="hidden" value="{$row['produto_preco']}">
														<input name="produto_imagem" type="hidden" value="img/uploads/produtos/{$row['produto_categoria']}/640x640/{$row['produto_imagem']}">
														<button class="btn btn-padrao" type="submit">Adicionar ao Carrinho</button>
													</div>
												</div>
											</div>
										</div>
									</div>
EOT;
					}
					echo $produtos_lista;
					} else { ?>
						<div class="col-md-12">
							<div class="row">
								<form class="form-item">
									<article class="col-md-12 col-sm-12 col-xs-12 text-center">
										<h3>Não foi selecionado nenhum produto para ser exibido</h3>
									</article>
								</form>
							</div>
						</div>
				<?php }	?>
		</div>
	</div>
</form>	

<script>
	$(document).ready(function(){

		// FANCYBOX

		$(document).ready(function(){
			$('.fancybox').fancybox();
			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});
		});

	    // ADICIONADOR DE QUANTIDADES

	    // Adiciona

	    $(".quantity-add").click(function(e){
	        //Vars
	        var count = 1;
	        var newcount = 0;
	        
	        //Wert holen + Rechnen
	        var elemID = $(this).parent().attr("id");
	        var countField = $("#"+elemID+'inp');
	        var count = $("#"+elemID+'inp').val();
	        var newcount = parseInt(count) + 1;
	        
	        //Neuen Wert setzen
	        $("#"+elemID+'inp').val(newcount);
	    });

	    // Remove

	    $(".quantity-remove").click(function(e){
	        //Vars
	        var count = 1;
	        var newcount = 0;
	        
	        //Wert holen + Rechnen
	        var elemID = $(this).parent().attr("id");
	        var countField = $("#"+elemID+'inp');
	        var count = $("#"+elemID+'inp').val();
	        var newcount = parseInt(count) - 1;
	        
	        //Neuen Wert setzen
	        $("#"+elemID+'inp').val(newcount);
	        
	    });

	    // Apaga

	    $(".quantity-delete").click(function(e){
	        //Vars
	        var count = 1;
	        var newcount = 0;
	        
	        //Wert holen + Rechnen
	        var elemID = $(this).parent().attr("id");
	        var countField = $("#"+elemID+'inp');
	        var count = $("#"+elemID+'inp').val();
	        var newcount = parseInt(count) - 1;
	        
	        var row = $( ".row" );
	        $(event.target).closest(row).html('');
	    });
		
	});
</script>
		        