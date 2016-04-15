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
		<link href="" rel="stylesheet"/>

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

				<?php include $_SERVER['DOCUMENT_ROOT'].'/include/admin-menu.php'; ?>

				<div class="col-lg-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							Default Panel
						</div>
						<div class="panel-body">

							<div class="col-lg-3">
								<a href="" class="btn btn-submit ">verzendkosten</a>
							</div>
							<div class="col-lg-3">
								<a href="" class="btn btn-submit">adresgegevens</a>
							</div>
							<div class="col-lg-3">
								<a href="" class="btn btn-submit">social media</a>
							</div>
							<div class="col-lg-3">
								<a href="/mijn-website-gegevens/faq/" class="btn btn-submit">FAQ</a>
							</div>
							<div class="col-lg-3">
								<a href="" class="btn btn-submit">over ons</a>
							</div>
							<div class="col-lg-3">
								<a href="" class="btn btn-submit">privacy verklaring</a>
							</div>
							<div class="col-lg-3">
								<a href="" class="btn btn-submit">algemene voorwaarden</a>
							</div>

						</div>
						<div class="panel-footer">
							Panel Footer
						</div>
					</div>
				</div>

				<?php include $_SERVER['DOCUMENT_ROOT'].'/include/notification-block.php'; ?>

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