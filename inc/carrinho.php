<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="divider"></div>		
		</div>
	</div>
</div>
<div class="carrinho">
	<div class="container">
		<div class="row">
			<dv class="col-md-12 col-sm-12 col-xs-12">
				<div class="row">
					<?php 
						include("controller/config.inc.php");
						setlocale(LC_MONETARY,"pt_BR"); 
					?>
					<div class="col-md-12">
						<h2 class="heading-title-underline text-center-xs">CARRINHO</h2>
					</div>
					<div class="col-md-12">
						<form class="row" method="POST" action="fechar-pedido.php">
							<ul class="col-md-12 lista-carrinho" id="orcamento">
								<li class="lista-header">
									<div class="row">
										<div class="col-md-6 hidden-xs">ITEM</div>
										<div class="col-md-1 text-center hidden-xs">PREÇO</div>
										<div class="col-md-3 text-center hidden-xs">QUANTIDADE</div>
										<div class="col-md-1 text-center hidden-xs">TOTAL</div>
										<div class="col-md-1 text-center hidden-xs">Remover?</div>
										<div class="col-xs-12 text-center visible-xs">Produtos Solicitados</div>
									</div>
								</li>
								<li class="lista-body">
									<div class="row">
										<div class="col-md-2 lista-foto text-center">
											<div class="out center-block">
												<div class="in">
													<a href="produto.php?item=Vaso De Vidro&amp;id=315">
														<img class="img-responsive center-block" src="img/produtos/page-image.jpg" alt="Produto 01" title="Produto 01">
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 lista-descricao">
											<div class="out">
												<div class="in">
													<a href="produto.php?id=315" title="Vaso" de="" vidro="">
														<p>Vaso De Vidro</p>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-1 lista-categoria text-center">
											<div class="out center-block">
												<div class="in">
													<div class="row">
														<div class="col-xs-6 visible-xs text-right-xs">Preço:  </div>
														<div class="col-md-12 col-xs-6 text-left-xs"><strong>R$ 00,00</strong></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3 lista-Itens">
											<div class="out center-block">
												<div class="in">
													<div class="form-group form-group-options center-block">
														<div id="315" class="input-group input-group-option quantity-wrapper">
															<span class="input-group-addon input-group-addon-remove quantity-remove btn">
																<span class="glyphicon glyphicon-minus"></span>
															</span>
															<input id="315inp" type="text" value="1" name="form-qtde" class="form-control quantity-count text-center" placeholder="1">
															<span class="input-group-addon input-group-addon-remove quantity-add btn">
																<span class="glyphicon glyphicon-plus"></span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-1 lista-categoria text-center">
											<div class="out center-block">
												<div class="in">
													<div class="row">
														<div class="col-xs-6 visible-xs text-right-xs">Total:  </div>
														<div class="col-md-12 col-xs-6 text-left-xs"><strong>R$ 00,00</strong></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-1 acao">
											<div class="out center-block">
												<div class="in">
													<a class="remove-item btn btn-lg btn-remove" href="#" data-code="240078"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</div>
								</li>									
							</ul>
							
							<div class="col-md-12 text-right">
								<div class="row">
									<div class="col-md-3 col-xs-6">
										<a class="btn btn-padrao btn-default pull-left btn-empty" href="catalogo.php">VOLTAR</a>		
									</div>
									<input name="id" type="hidden" value="{$row['id']}">
									<input name="product_name" type="hidden" value="{$row['product_name']}">
									<input name="product_code" type="hidden" value="{$row['product_code']}">
									<input name="product_size" type="hidden" value="{$row['product_size']}">
									<input name="product_cat" type="hidden" value="{$row['product_cat']}">
									<input name="product_subcat" type="hidden" value="{$row['product_subcat']}">
									<input name="product_type" type="hidden" value="{$row['product_type']}">
									<input name="product_image" type="hidden" value="{$row['product_image']}">
									<input name="product_image_hd" type="hidden" value="{$row['product_image_hd']}">
									<input name="product_price" type="hidden" value="{$row['product_price']}">
									<input name="product_stock" type="hidden" value="{$row['product_stock']}">
									<input name="product_qtde" type="hidden" value="{$row['product_stock']}">
									<div class="col-md-3 col-xs-6 pull-right">
										<input class="btn btn-default btn-full" type="submit" value="FINALIZAR COMPRA">		
									</div>
								</div>
								<br><br><br>
							</div>
						</form>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>