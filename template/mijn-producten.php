<?php

	\Fr\LS::init();
	if(!\Fr\LS::$loggedIn == true || !\Fr\LS::getUser('status') == 1){
		\Error\ES::GetResponsCode(403);
		exit;
	}

	if(\Fr\CU::segment(2) == 'toevoegen'){
		include $_SERVER['DOCUMENT_ROOT'] . '';
		exit;
	}

	if(\Fr\CU::segment(2) == 'subcategorie-toevoegen'){
		include $_SERVER['DOCUMENT_ROOT'] . '/libaries/productSystem/templates/merken.php';
		exit;
	}

	if(isset($_GET['edit'])){
		include $_SERVER['DOCUMENT_ROOT'] . '/libaries/productSystem/templates/wijzigen.php';
		exit;
	}

	if(isset($_GET['remove'])){
		\Product\PS::removeProduct($_GET['remove']);
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

		<title><?php echo \Fr\LS::$config['info']['company'].' - '.\Fr\CU::segment(1); ?> </title>

		<link href="/css/bootstrap.css" rel="stylesheet">
		<link href="/css/product.css" rel="stylesheet"/>

		<style>
			.btn{
				margin-bottom: 20px;
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

		<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/page-header.php"; ?>

    	<div class="container">
			<div class="row">

				<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/admin-menu.php"; ?>

				<div class="col-lg-8">
					<div class="panel panel-yellow">
						<div class="panel-heading">
							Product paneel
						</div>
						<div class="panel-body">
							<div class="panel-body row">

								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
										<tr>
											<th>#</th>
											<th>Naam</th>
											<th>Datum</th>
											<th>Product Nr.</th>
											<th>Prijs</th>
											<th>Status</th>
										</tr>
										</thead>
										<tbody>
											<?php echo \Product\PS::showAllProducts(); ?>
										</tbody>
									</table>
									<div class="col-lg-3 row">
										<a href="/mijn-producten/toevoegen/" class="btn btn-default ">toevoegen</a>
									</div>
								</div>
								<hr>
								<!-- /.table-responsive -->

								<div class="col-lg-12">
									<div class="panel panel-default row">
										<div class="panel-heading">
											Product opties
										</div>
										<div class="panel-body row">

											<div class="col-lg-3">
												<a href="/mijn-producten/subcategorie-toevoegen/" class="btn btn-submit">subcategorie toevoegen</a>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/notification-block.php'; ?>

			</div>

    	</div> <!-- /container -->

    	<!-- footer -->
		<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
		<!-- /footer -->

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="/js/bootstrap.js"></script>
	    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
		<script>
			$(document).on('change', '.btn-file :file', function() {
				var input = $(this),
					numFiles = input.get(0).files ? input.get(0).files.length : 1,
					label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				input.trigger('fileselect', [numFiles, label]);
			});

			$(document).ready( function() {
				$('.btn-file :file').on('fileselect', function(event, numFiles, label) {

					var input = $(this).parents('.input-group').find(':text'),
						log = numFiles > 1 ? numFiles + ' files selected' : label;

					if( input.length ) {
						input.val(log);
					} else {
						if( log ) alert(log);
					}

				});
			});

			$(document).on('click', ':not(form)[data-confirm]', function(){
				return confirm($(this).data('confirm'));
			});

		</script>
	</body>

</html>