<?php
	session_start(); //start session
	include_once("controller/config.inc.php"); //include config file
	setlocale(LC_MONETARY,"pt_BR"); 
?>

<?php
	if(isset($_POST["produto_codigo"])){
		foreach($_POST as $key => $value){
			$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
		}
		//we need to get product name and price from database.
		$statement = $mysqli_conn->prepare("SELECT produto_titulo, produto_preco FROM produtos_lista WHERE produto_codigo=? LIMIT 1");
		$statement->bind_param('s', $new_product['produto_codigo']);
		$statement->execute();
		$statement->bind_result($produto_titulo, $produto_preco);

		while($statement->fetch()){ 
			$new_product["produto_nome"] = $produto_titulo; 
			$new_product["produto_preco"] = $produto_preco;  
			if(isset($_SESSION["products"])){ 
				if(isset($_SESSION["products"][$new_product['produto_codigo']])) 
				{
					unset($_SESSION["products"][$new_product['produto_codigo']]); 
				}			
			}
			$_SESSION["products"][$new_product['produto_codigo']] = $new_product;	
		}
	 	$total_items = count($_SESSION["products"]); 
		die(json_encode(array('items'=>$total_items))); 
	}

	################## list products in cart ###################
	
	if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1){
		if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
			$cart_box = '<ul class="cart-products-loaded">
			';
			$total = 0;
			foreach($_SESSION["products"] as $product){ //loop though items and prepare html content
				
				//set variables to use them in HTML content below
				$produto_id			= $product["id"];
				$produto_codigo 	= $product["produto_codigo"];
				$produto_titulo 	= $product["produto_titulo"];
				$produto_desc 		= $product["produto_descricao"];
				$produto_imagem 	= $product["produto_imagem"];
				$produto_imagem_hd	= $product["produto_imagem_hd"];
				$produto_cat 		= $product["produto_categoria"];
				$produto_preco 		= $product["produto_preco"];
				$produto_qtde		= $product["produto_qtde"];
				
				$cart_box .=  
				"<li class='lista-body'>
					<div class='row'>
						<div class='col-md-2 lista-foto text-center'>
							<div class='out center-block'>
								<div class='in'>
									<a href='produto.php?cod=" . $produto_codigo . "'>
										<img class='img-responsive center-block' src='" . $produto_imagem . "' alt='" . $produto_titulo . "' title='" . $produto_titulo . "'>
									</a>
								</div>
							</div>
						</div>
						<div class='col-md-6 lista-descricao'>
							<div class='out'>
								<div class='in'>
									<a href='produto.php?cod=" . $produto_codigo . "'>
										<p><strong>" . $produto_titulo . "</strong></p>
									</a>
								</div>
							</div>
						</div>
						<div class='col-md-2 lista-Itens'>
							<div class='out center-block'>
								<div class='in text-center'>
									<p><strong>Qtde:</strong><br>" . $produto_qtde . "</p>
								</div>
							</div>
						</div>
						<div class='col-md-2 acao'>
							<div class='out center-block'>
								<div class='in'>
									<a class='btn btn-lg remove-item' href='#' data-code='" . $produto_codigo . "'><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></a>
								</div>
							</div>
						</div>
					</div>
				</li>";
				$subtotal = ($produto_preco);
				$total = $produto_qtde;
			}
			$cart_box .= "</ul>";
			$cart_box .= '<div class="cart-products-total"><u><a class="btn btn-default" href="carrinho.php" title="Revisar o Carrinho e Realizar a Compra">Comprar!</a></u></div>';
			die($cart_box); //exit and output content
		}else{
			die("
				<ul class='cart-products-loaded'>
					<li class='lista-body'>
						<br><p class='text-center'>Você não possui produtos adicionados</p><br>
					</li>
				</ul>"); //we have empty cart
		}
	}

	################# remove item from shopping cart ################
	if(isset($_GET["remove_code"]) && isset($_SESSION["products"]))
	{
		$produto_codigo   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove
		if(isset($_SESSION["products"][$produto_codigo]))
		{
			unset($_SESSION["products"][$produto_codigo]);
		}
	 	$total_items = count($_SESSION["products"]);
		die(json_encode(array('items'=>$total_items)));
	}