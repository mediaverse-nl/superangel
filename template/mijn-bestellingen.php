<?php

	$result = \Cart\SC::GetOrders(\Fr\LS::getUser('id'));
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
				<div class="panel panel-default">
					<table class="table">
						<thead>
							<tr>
								<th>Nummer</th>
								<th>Datum</th>
								<th>Status</th>
								<th>Beschrijving</th>
								<th>Totaal</th>
							</tr>
						</thead>
						<tbody>
						<?php

							if (!empty($result)){
								foreach($result as $row => $i ){

									if($i['paid'] == 'paid'){
										$status = 'Betaald';
									}elseif($i['paid'] == 'cancelled'){
										$status = '	Geannuleerd';
									}elseif($i['paid'] == 'open'){
										$status = 'Open';
									}

									$time = strtotime($i['date']);
									$myFormatForView = date("d-m-Y", $time);

									echo '<tr class="cart_item">';
										echo '<td class="product-subtotal">';
										echo '<span class=""><a href="/mijn-bestelling/'. str_replace("tr_", "", $i['payment_id']).'/">'. str_replace("tr_", "", $i['payment_id']) .'</a></span>';
										echo '</td>';
										echo '<td class="product-subtotal">';
										echo '<span class="">'. $myFormatForView .'</span>';
										echo '</td>';
										echo '<td class="product-subtotal">';
										echo '<span class="">'. $status .'</span>';
										echo '</td>';
										echo '<td class="product-subtotal">';
										echo '<span class="">'. $i['description'] .'</span>';
										echo '</td>';
										echo '<td class="product-subtotal">';
										echo '<span class=""> &euro; &nbsp;'. $i['amount'] .'</span>';
										echo '</td>';
									echo '</tr>';

								}
							}else{
								echo 'u heeft geen bestellingen.';
							}

						?>
						</tbody>
					</table>
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