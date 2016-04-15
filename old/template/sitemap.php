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

		<div class="header-title">
			<div class="container">
				<h1 class="page-title"><?php echo \Fr\CU::segment(1); ?></h1>
			</div>
		</div>

    	<div class="container">

			
			
    	</div> <!-- /container -->
    	
    	<!-- footer -->
		<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
		<!-- /footer -->
  
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="/js/bootstrap.js"></script>
	    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

	</body>
	
</html>