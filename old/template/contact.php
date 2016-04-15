<?php

	if(isset($_POST['submit'])){

		$name = htmlentities($_POST['name']);
		$email = htmlentities($_POST['email']);
		$subject = htmlentities($_POST['subject']);
		$message = htmlentities($_POST['message']);

		if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message']) ){

			if(\Fr\LS::sendMail($email, $subject, $message)){

				\Product\PS::sendQuestion($name, $email, $subject, $message);

			}
		}

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

		<?php include $_SERVER['DOCUMENT_ROOT'].'/include/page-header.php'; ?>

		<div class="">

			<div style="height:300px;width:100%;margin-top: -20px;">
				<div id="map" style="height:300px;width:100%;"></div>
				<style>#gmap_canvas img{ max-width:none!important; background:none !important}</style>
			</div>

		</div>

    	<div class="container">

			<div class="row">
				<div class="col-lg-8">
					<form role="form" data-toggle="validator" class="form" action="/contact/" method="POST" >
						<fieldset>
							<legend>Klantenservice</legend>
							<div class="form-group ">
								<input class="form-control col-lg-7" name="name" placeholder="Naam" >
							</div>
							<div class="form-group ">
								<input class="form-control col-lg-7" name="email" placeholder="E-mail" >
							</div>
							<div class="form-group ">
								<input class="form-control col-lg-7" name="subject" placeholder="Onderwerp" >
							</div>
							<div class="form-group ">
								<textarea class="form-control col-lg-9" rows="7" name="message" placeholder="Bericht"></textarea>
							</div>
							<div class="form-group" >
								<button type="submit" name="submit" class="btn btn-primary">Verzenden</button>
							</div>
						</fieldset>

					</form>
				</div>
				<div class="col-lg-4">
					<fieldset>
						<legend>Adres gegevens</legend>
						<li><a>Openingstijden</a></li>
						<li><a>Maandag t/m vrijdag van 09:00-17:00 </a></li>
						<li><a>Zaterdag van 12:00-15:00</a></li>
						<li><a>Zondag van 12:00-15:00</a></li>
					</fieldset>
				</div>
			</div>

			
    	</div> <!-- /container -->
    	
    	<!-- footer -->
		<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
		<!-- /footer -->
  
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="/js/bootstrap.js"></script>
	    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
		<script src="/js/bootstrap-validator-master/dist/validator.js"> </script>
		<!-- maps integration -->
		<script src="https://maps.googleapis.com/maps/api/js"></script>
		<script>
			function initialize() {
				var mapCanvas = document.getElementById('map');
				var myLatLng = {lat: 51.426067, lng: 5.489206};

				var mapOptions = {
					center: myLatLng,
					zoom: 14,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map = new google.maps.Map(mapCanvas, mapOptions);

				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map,
					title: 'Superangel / Big Girlz!'
				});
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>

	</body>
	
</html>