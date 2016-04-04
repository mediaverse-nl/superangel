<?php

$html_output = \Cart\SC::cartItems();
$count_output = \Cart\SC::countTotalProducts();
$CartAmount = \Cart\SC::getCartAmount();


if(\Fr\LS::$loggedIn === true){
	//new article in cart
	if(isset($_GET['cart'])){
		\Cart\SC::InsertInCart($_GET['cart']);
	}

	//remove from cart
	if(isset($_GET['remove'])){
		\Cart\SC::removeFromCart($_GET['remove']);
	}

	//update cart
	if(isset($_GET['update'])){
		\Cart\SC::removeFromCart($_GET['remove']);
	}

}else{
	/// start sesssion


}

if(isset($_POST['unit'])){
	\Cart\SC::addOrRemoveUnit();
}


if(isset($_GET['min'])){

	$min = htmlentities($_GET['min']);
	\Cart\SC::removeItemFromCart( $min );

}

if(isset($_GET['plus'])){
	$plus = htmlentities($_GET['plus']);
	\Cart\SC::AddItemToCart( $plus );

}



?>

<html lang="en" hola_ext_inject="disabled">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/img/logo/favicon.ico">

		<title></title>

		<link href="/css/bootstrap.css" rel="stylesheet">
		<link href="/css/winkelwagen.css" rel="stylesheet"/>

		<style>
			.center{
				width: 150px;
				margin: 40px auto;

			}
		</style>

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
	
		<!-- Static navbar menu -->
		<?php include $_SERVER['DOCUMENT_ROOT'].'/include/menu.php'; ?>

		<?php include $_SERVER['DOCUMENT_ROOT'].'/include/page-header.php'; ?>


    	<div class="container">

			<div id="products-wrapper" class="row">
				<div class="view-cart">

					<div class="col-lg-12">
						<div class="col-lg-9">
							<h3 class="bag-summary">Uw Item(s) - <span><?php echo $count_output; ?></span></h3>
							<table class="shop_table cart col-lg-12" cellspacing="0" style="border-bottom: 1px solid #D0D0D0; ;">
								<thead>
									<tr>
										<th class="product-thumbnail">Afbeelding</th>
										<th class="product-name">Naam</th>
										<th class="product-price">p.st.</th>
										<th class="product-price">Maat</th>
										<th class="product-quantity">Hoeveelheid</th>
										<th class="product-subtotal">Subtotaal</th>
										<th class="product-remove">&nbsp;</th>
									</tr>
									</thead>
									<tbody>

										<?php echo $html_output; ?>

									</tr>
								</tbody>
							</table>

						</div>

						<div class="col-lg-3">
							<h3 class="bag-totals">Totaal</h3>
							<div class="cart_totals ">
								<table cellspacing="0">
									<tbody><tr class="cart-subtotal">
										<th>Subtotaal</th>
										<td><span class="amount">&euro;
												<?php
												echo	$CartAmount['cart'];

												?>
											</span>
										</td>
									</tr>
									<tr class="shipping">
										<th>Verzending</th>
										<td>
											&euro;7.50 <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0" value="free_shipping" class="shipping_method">
										</td>
									</tr>
									<tr class="order-total">
										<th>Totaal</th>
										<td><strong><span class="amount">&euro;<?php echo \Cart\SC::getCartAmount()['shopping']; ?></span></strong> </td>
									</tr>
									</tbody></table>
								<div class="wc-proceed-to-checkout">
									<a class="form-control btn btn-submit" style="margin-bottom: 10px; background-color: #5cb85c !important;" href="/kassa/gegevens/" class="checkout-button button alt wc-forward">Volgende</a>
								</div>
							</div>
							<a class="btn btn-submit" href="/shop/">Verder winkelen</a>
						</div>


					</div>
				</div>
			</div>


		</div> <!-- /container -->
    	
    	<!-- footer -->
		<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
		<!-- /footer -->
  
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="/js/bootstrap.js"></script>
	    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

	</body>
	
</html>