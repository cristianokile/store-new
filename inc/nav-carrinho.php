<div class="carrinho-icon">
	<a href="#" class="cart-box" id="cart-info" title="Ver Carrinho">
		<?php 
		if(isset($_SESSION["products"])){
			$contador = count($_SESSION["products"]); 
			if ($contador == 1) {
				echo $contador . " ITEM";
			}else{
				echo $contador . " ITENS";
			}

		}else{
			echo "0 ITENS"; ?> 
		<?php }?>
	</a>
	<div class="shopping-cart-box">
		<a href="#" class="close-shopping-cart-box">Fechar</a>
		<h3>Carrinho</h3>
		<div id="shopping-cart-results">
		</div>
	</div>
</div>