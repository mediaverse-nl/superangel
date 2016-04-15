<?php

?>

<html lang="en" hola_ext_inject="disabled">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/img/logo/favicon.ico">

		<title><?php echo \Fr\LS::$config['info']['company'].' - Shop'; ?></title>

		<link href="/css/bootstrap.css" rel="stylesheet">

		<link href="/libaries/slickSlider/slick/slick.css" rel="stylesheet"/>
		<link href="/libaries/slickSlider/slick/slick-theme.css" rel="stylesheet"/>

		<link href="" rel="stylesheet"/>

		<style>
			.faceted{

			}
			.faceted li{
				padding: 2px 0px;;
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

			<div class="col-lg-2" style="padding-left: 0px;">
				<?php
					if(\Fr\CU::segment(2)){
						echo \Product\PS::createFacetedMemu();
					}else{
						echo '<div class="widget-heading clearfix" style="color:#777777; ">
								<h4><span>Categorieen</span></h4>
							  </div>';
						echo '<ul class="faceted" style="border-left: 3px solid #D2D2D3; list-style-type: none; padding-left: 15px; margin-left: 10px;">';
						echo \Product\PS::GetMenuCate('li', 'kleding');
						echo '</ul>';
					}
				?>
			</div>

			<?php if(\Fr\CU::segment(2)){ ?>

				<div class="col-lg-10">
					<div class="row">
						<?php echo \Product\PS::getProducts(); ?>
					</div>
				</div>

			<?php }else{ ?>

				<div class="col-lg-10" style=" height: 400px;">
					<div class="row">
						<div class="main-carousel" style="padding-left: 20px;">
							<div>
								<img style="width: 100%;" src="/img/folders/boris_nieuwe_col_002.jpg">
							</div>
							<div>
								<img style="width: 100%;" src="/img/folders/Halsoverkop.jpg">
							</div>
							<div>
								<img style="width: 100%;" src="/img/folders/Zara-collectie-mei-20101.jpg">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-10 pull-right" style="padding-right: 0px;">
					<br>
					<div class="" style=" padding: 10px; color: #777777; border-top: 1px dashed #D2D2D3; border-bottom: 1px dashed #D2D2D3; margin-left: 5px;">
						nieuwste collectie
						<div class="pull-right"></div>
					</div>
					<br>
				</div>
				<div class="col-lg-10 pull-right" style=" height: 400px;">
					<div class="row">
						<div class="carousel-newproducts">
							<?php echo \Product\PS::GetNewestProducts(); ?>
						</div>
					</div>
				</div>

			<?php } ?>
			
    	</div> <!-- /container -->
    	
    	<!-- footer -->
		<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
		<!-- /footer -->
  
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="/js/bootstrap.js"></script>
	    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
		<script src="/libaries/slickSlider/slick/slick.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('.main-carousel').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 5000,
					arrows: true,
					focusOnSelect: false
				});
				$('.carousel-newproducts').slick({
					slidesToShow: 4,
					slidesToScroll: 4,
					autoplay: true,
					autoplaySpeed: 5000,
					arrows: true,
					focusOnSelect: false
				});
			});
		</script>

	</body>
	
</html>