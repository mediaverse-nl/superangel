<?php

$invoiceProducts = \Cart\SC::getInvoiceDetails('tr_'.\Fr\CU::segment(2));

?>

<html lang="en" hola_ext_inject="disabled">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/img/logo/favicon.ico">

	<title><?php echo \Fr\LS::$config['info']['company'].' - '.\Fr\CU::segment(1); ?> </title>

	<link href="/css/bootstrap.css" rel="stylesheet">
	<link href="/css/cssmenu.css" rel="stylesheet"/>

	<style>
		.height {
			min-height: 200px;
		}

		.icon {
			font-size: 47px;
			color: #5CB85C;
		}

		.iconbig {
			font-size: 77px;
			color: #5CB85C;
		}

		.table > tbody > tr > .emptyrow {
			border-top: none;
		}

		.table > thead > tr > .emptyrow {
			border-bottom: none;
		}

		.table > tbody > tr > .highrow {
			border-top: 3px solid;
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
<!-- /Static navbar menu -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/page-header.php'; ?>

<div class="container">

	<div class="row">
		<div class="col-lg-3">
			<!-- begin of side menu -->
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/account-menu.php'; ?>
			<!-- end of side menu -->
		</div>

		<div class="col-lg-9">

				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							<i class="fa fa-search-plus pull-left icon"></i>
							<h2>Invoice for purchase #33221</h2>
						</div>
						<hr>
						<div class="row">
							<div class="col-xs-12 col-md-3 col-lg-3 pull-left">
								<div class="panel panel-default height">
									<div class="panel-heading">Billing Details</div>
									<div class="panel-body">
										<strong>David Peere:</strong><br>
										1111 Army Navy Drive<br>
										Arlington<br>
										VA<br>
										<strong>22 203</strong><br>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-3 col-lg-3">
								<div class="panel panel-default height">
									<div class="panel-heading">Payment Information</div>
									<div class="panel-body">
										<strong>Card Name:</strong> Visa<br>
										<strong>Card Number:</strong> ***** 332<br>
										<strong>Exp Date:</strong> 09/2020<br>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-3 col-lg-3">
								<div class="panel panel-default height">
									<div class="panel-heading">Order Preferences</div>
									<div class="panel-body">
										<strong>Gift:</strong> No<br>
										<strong>Express Delivery:</strong> Yes<br>
										<strong>Insurance:</strong> No<br>
										<strong>Coupon:</strong> No<br>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-3 col-lg-3 pull-right">
								<div class="panel panel-default height">
									<div class="panel-heading">Shipping Address</div>
									<div class="panel-body">
										<strong>David Peere:</strong><br>
										1111 Army Navy Drive<br>
										Arlington<br>
										VA<br>
										<strong>22 203</strong><br>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="text-center"><strong>Order summary</strong></h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-condensed">
										<thead>
										<tr>
											<td><strong>Item Name</strong></td>
											<td class="text-center"><strong>Item Price</strong></td>
											<td class="text-center"><strong>Item Quantity</strong></td>
											<td class="text-right"><strong>Total</strong></td>
										</tr>
										</thead>
										<tbody>

										<?php

										 foreach($invoiceProducts as $key){
										 	echo '<tr>
													<td>'.$key['product_name'].'</td>
													<td class="text-center">'.$key['product_price'].'</td>
													<td class="text-center">'.$key['product_units'].'</td>
													<td class="text-right">'.$key['product_price'].'</td>
												</tr>';
										 }

										?>

										<tr>
											<td class="highrow"></td>
											<td class="highrow"></td>
											<td class="highrow text-center"><strong>Subtotal</strong></td>
											<td class="highrow text-right">$958.00</td>
										</tr>
										<tr>
											<td class="emptyrow"></td>
											<td class="emptyrow"></td>
											<td class="emptyrow text-center"><strong>Shipping</strong></td>
											<td class="emptyrow text-right">$20</td>
										</tr>
										<tr>
											<td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
											<td class="emptyrow"></td>
											<td class="emptyrow text-center"><strong>Total</strong></td>
											<td class="emptyrow text-right">$978.00</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
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

<script type="text/javascript">
	$('#cssmenu li.active').addClass('open').children('ul').show();
	$('#cssmenu li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp(200);
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown(200);
			element.siblings('li').children('ul').slideUp(200);
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp(200);
		}
	});
</script>

</body>

</html>