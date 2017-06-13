<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="divider"></div>
		</div>
	</div>
</div>
<?php  
	if(isset($_GET['categoria'])) {
		$categoria = $_GET['categoria'];
	}
	if(isset($_GET['produto'])) {
		$produto = $_GET['produto'];
	}
?>
<form class="form-item">
	<div class="produto-descricao">
		<div class="container">
			<div class="row">
				<div class="col-md-4 produto-descricao-imagem">
					<figure>
						<img class="img-responsive" src="img/uploads/produtos/<?php echo $categoria;?>/640x640/<?php echo $produto?>.jpg" alt="<?php echo $produto;?>">
					</figure>
					<a class="fancybox-effects-a" href="img/uploads/produtos/<?php echo $categoria;?>/640x640/<?php echo $produto?>.jpg" title="<?php echo $produto;?>"></a>
				</div>
				<div class="col-md-8 produto-descricao-info">
					<div class="descricao-breadcrumb">
						<ul class="list-style-none">
							<li><span class="glyphicon glyphicon-chevron-left"></span></li>
							<li><a href="#"><strong>VOLTAR</strong></a></li>
							<li>/</li>
							<li><a href="#">HOME</a></li>
							<li>/</li>
							<li><a href="#">PRODUTOS</a></li>
							<li>/</li>
							<li><a href="#"><?php echo $categoria ?></a></li>
						</ul>
					</div>
					<div class="descricao-titulo">
						<h1><strong><?php echo $produto; ?></strong></h1>
						<h2>R$ 00,00</h2>
						<h3>4X DE R$ 00,00</h3>
					</div>
					<div class="descricao-info">
						<h4>DESCRIÇÃO</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla quod maiores quaerat, eos natus corporis quae a laboriosam amet, voluptatibus iure dicta. Eaque voluptas, rem autem voluptates tempora exercitationem eius.</p>
					</div>
					<div class="descricao-seletor">
						<div class="row">
							<div class="col-md-2">
								<span class="qtde">QUANTIDADE</span>		
							</div>
							<div class="col-md-3">
								<div class="form-group form-group-options center-block">
								<div id="id01" class="input-group input-group-option quantity-wrapper">
										<span class="input-group-addon input-group-addon-remove quantity-remove btn">
											<span class="glyphicon glyphicon-minus"></span>
										</span>
										<input id="id01inp" type="text" value="1" name="product_qtde" class="form-control quantity-count text-center" placeholder="1">
										<span class="input-group-addon input-group-addon-remove quantity-add btn">
											<span class="glyphicon glyphicon-plus"></span>
										</span>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<input name="id" type="hidden" value="<?php echo $produto ?>">
								<input name="product_name" type="hidden" value="<?php echo $produto ?>">
								<!-- <input name="product_code" type="hidden" value="{$row['product_code']}"> -->
								<!-- <input name="product_size" type="hidden" value="{$row['product_size']}"> -->
								<input name="product_cat" type="hidden" value="<?php echo $categoria ?>">
								<!-- <input name="product_subcat" type="hidden" value="{$row['product_subcat']}"> -->
								<!-- <input name="product_type" type="hidden" value="{$row['product_type']}"> -->
								<!-- <input name="product_image" type="hidden" value="{$row['product_image']}"> -->
								<!-- <input name="product_image_hd" type="hidden" value="{$row['product_image_hd']}"> -->
								<input name="product_price" type="hidden" value="00,00">
								<input name="product_stock" type="hidden" value="10">
								
								<a href="#" class="btn btn-padrao">COMPRAR</a><br>
								<button class="btn btn-padrao" type="submit">Adicionar ao Carrinho</button>
							</div>
						</div>
					</div>
				</div>
			</div>	
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
		        