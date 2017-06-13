<?php
	session_start(); //start session
	include_once("controller/config.inc.php"); //include config file
	setlocale(LC_MONETARY,"pt_BR"); 
?>

<?php
	if(isset($_POST["product_code"])){
		foreach($_POST as $key => $value){
			$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
		}
		//we need to get product name and price from database.
		$statement = $mysqli_conn->prepare("SELECT product_name, product_price FROM products_list WHERE product_code=? LIMIT 1");
		$statement->bind_param('s', $new_product['product_code']);
		$statement->execute();
		$statement->bind_result($product_name, $product_price);

		while($statement->fetch()){ 
			$new_product["product_name"] = $product_name; 
			$new_product["product_price"] = $product_price;  
			if(isset($_SESSION["products"])){ 
				if(isset($_SESSION["products"][$new_product['product_code']])) 
				{
					unset($_SESSION["products"][$new_product['product_code']]); 
				}			
			}
			$_SESSION["products"][$new_product['product_code']] = $new_product;	
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
				$product_id 		= $product["id"];
				$product_name 		= $product["product_name"];
				$product_code 		= $product["product_code"];
				$product_size 		= $product["product_size"];
				$product_cat 		= $product["product_cat"];
				$product_subcat 	= $product["product_subcat"];
				$product_type 		= $product["product_type"];
				$product_image 		= $product["product_image"];
				$product_image_hd	= $product["product_image_hd"];
				$product_price 		= $product["product_price"];
				$product_stock 		= $product["product_stock"];
				$product_qtde		= $product["product_qtde"];
				
				$cart_box .=  
				"<li class='lista-body'>
					<div class='row'>
						<div class='col-md-2 lista-foto text-center'>
							<div class='out center-block'>
								<div class='in'>
									<a href='produto.php?id=" . $product_id . "'>
										<img class='img-responsive center-block' src='" . $product_image . "' alt='" . $product_name . "' title='" . $product_name . "'>
									</a>
								</div>
							</div>
						</div>
						<div class='col-md-6 lista-descricao'>
							<div class='out'>
								<div class='in'>
									<a href='produto.php?id=" . $product_id . "' title= ". $product_name . ">
										<p><strong>" . $product_name . "</strong></p>
									</a>
									<p><strong>Tamanho: <br></strong> " . $product_size . "</p>
								</div>
							</div>
						</div>
						<div class='col-md-2 lista-Itens'>
							<div class='out center-block'>
								<div class='in text-center'>
									<p><strong>Qtde:</strong><br>" . $product_qtde . "</p>
								</div>
							</div>
						</div>
						<div class='col-md-2 acao'>
							<div class='out center-block'>
								<div class='in'>
									<a class='btn btn-lg remove-item' href='#' data-code='" . $product_code . "'><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></a>
								</div>
							</div>
						</div>
					</div>
				</li>";
				$subtotal = ($product_price);
				$total = $product_qtde;
			}
			$cart_box .= "</ul>";
			$cart_box .= '<div class="cart-products-total"><u><a class="btn btn-default" href="carrinho.php" title="Revisar o Carrinho e Solicitar orçamento">Solicitar orçamento</a></u></div>';
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
		$product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove
		if(isset($_SESSION["products"][$product_code]))
		{
			unset($_SESSION["products"][$product_code]);
		}
	 	$total_items = count($_SESSION["products"]);
		die(json_encode(array('items'=>$total_items)));
	}