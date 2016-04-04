<?php

	$view_product = \Product\PS::viewSingleProduct(\Fr\CU::segment(3));

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

		<link rel="stylesheet" type="text/css" href="/libaries/slickSlider/slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="/libaries/slickSlider/slick/slick-theme.css"/>

		<link href="" rel="stylesheet"/>

		<style>
			.slider-nav img{
				float: none !important;
				width: 100px !important;
				height: inherit;
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

			<div class="" style="margin-bottom: 20px; padding: 10px; color: #777777; border-top: 1px dashed #D2D2D3; border-bottom: 1px dashed #D2D2D3; margin-left: 5px;">

				<a href="/shop/<?php echo \Fr\CU::segment(2); ?>/">Terug</a>

				<div class="pull-right">
					<?php if(\Product\PS::nextProduct(true, false) != NULL){ ?>
						<a href="/product/<?php echo \Fr\CU::segment(2).'/'.\Product\PS::nextProduct(true, false); ?>/">
							<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
						</a>
					<?php } ?>

					<?php if(\Product\PS::nextProduct(false, true) != NULL){ ?>
						<a href="/product/<?php echo \Fr\CU::segment(2).'/'.\Product\PS::nextProduct(false, true); ?>/">
							<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
						</a>
					<?php } ?>

				</div>
			</div>

			<div>
				<?php echo $view_product ?>
			</div>
			
    	</div> <!-- /container -->
    	
    	<!-- footer -->
		<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
		<!-- /footer -->
  
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="/js/bootstrap.js"></script>
	    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

		<script src="/libaries/slickSlider/slick/slick.js"></script>

		<script>
			$(document).ready(function(){
				$('.slider-for').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
					fade: true,
					asNavFor: '.slider-nav',
					adaptiveHeight: true
				});
				$('.slider-nav').slick({
					slidesToShow: 4,
					slidesToScroll: 1,
					asNavFor: '.slider-for',
					focusOnSelect: true
				});
			});
		</script>
	</body>
	
</html>