<?php $categoria = 'colares'; ?>
<?php $produto = $categoria; ?>

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
			<div class="col-md-8 col-md-offset-2 text-center">
				<h2 class="heading-title"><?php echo $categoria; ?></h2>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="row">
				<?php 
					for ($x = 1; $x <= 21; $x++) { ?>
						<?php $y = "0" ?>
							<?php if ( $x <= 9) {
								$y = "0";
							} else{
								$y = "";
							}?>
							<article class="col-md-4 col-sm-6 col-xs-12">
								<a href="produto.php?categoria=<?php echo $categoria ?>&produto=<?php echo $produto?>-0<?php echo $y;?><?php echo $x;?>" title="<?php echo $produto;?> 0<?php echo $y;?><?php echo $x;?>">
									<figure class="produto-<?php echo $x;?>">
										<img class="img-responsive" src="img/uploads/produtos/<?php echo $categoria;?>/240x240/<?php echo $produto?>-0<?php echo $y;?><?php echo $x;?>.jpg" alt="<?php echo $produto;?><?php echo $x;?>">
									</figure>
									<div class="produto-info">
										<h2><strong><?php echo $produto;?> 0<?php echo $y;?><?php echo $x;?></strong></h2>
										<h3>R$ 00,00</h3>
									</div>
								</a>
							</article>
					<?php }?>	
				</div>
			</div>
		</div>
	</div>
</div>