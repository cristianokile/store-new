<?php 
	$pageTitle = "Ju Chimello | Carrinho";
	$pageDescription = "";
	session_start(); 
?>
<script>
	$(document).ready(function(){	
		//Show Items in Cart
		$( ".cart-box").click(function(e) { //when user clicks on cart box
			e.preventDefault(); 
			$(".shopping-cart-box").fadeIn(); //display cart box
			$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
			$("#shopping-cart-results" ).load( "carrinho_add.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
		});
		//Close Cart
		$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
			e.preventDefault(); 
			$(".shopping-cart-box").fadeOut(); //close cart-box
		});
		//Remove items from cart
		$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
			window.location.reload();
			e.preventDefault(); 
			var pcode = $(this).attr("data-code"); //get product code
			$(this).parent().fadeOut(); //remove item element from box
			$.getJSON( "carrinho_add.php", {"remove_code":pcode} , function(data){ //get Item count from Server
				$("#cart-info").html(data.items); //update Item count in cart-info
				$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
				$(".lista-body").load( "carrinho_add.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
			});
		});
		//Remove items from orcamento
		$("#orcamento").on('click', 'a.remove-item', function(e) {
			window.location.reload();
			e.preventDefault(); 
			var pcode = $(this).attr("data-code"); //get product code
			$(this).parent().fadeOut(); //remove item element from box
			$.getJSON( "carrinho_add.php", {"remove_code":pcode} , function(data){ //get Item count from Server
				$("#cart-info").html(data.items); //update Item count in cart-info
				$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
				$(".lista-body").load( "carrinho_add.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
			});
		});
	});
</script>

<?php require('header.php') ?>

	<!-- SIDEBAR TOP -->
	<aside class="aside-top-page-carrinho">
		<?php require('inc/aside-top.php');?>
	</aside>

	<!-- HEADER -->
	<header class="header-main">
		<?php require('nav-header.php');?>
	</header>

	<!-- CONTENT -->
	<section class="section-page-carrinho">
		<?php require('inc/content-carrinho.php');?>
	</section>
	<section class="jumbotron-page-carrinho">
		<?php require('inc/jumbotron.php');?>
	</section>

<?php require('footer.php');?>
