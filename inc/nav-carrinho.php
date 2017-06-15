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
		<?php if ($contador === 1){ 
			echo "<h3>" . $contador . " item adicionado ao carrinho</h3>";
		} elseif ($contador >= 2){
			echo "<h3>" . $contador . " itens adicionados ao carrinho</h3>";
		}?>
		<div id="shopping-cart-results">
		</div>
	</div>
</div>