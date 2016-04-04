<?php

	if(\Fr\LS::$loggedIn == false){
		\Error\ES::GetResponsCode(403);
		exit;
	}

	$user_info = \Fr\LS::getUser('*');

	$segmentPart = \Fr\CU::segment(2);

	if(!empty($segmentPart)){
		switch($segmentPart){

			case 'accountgegevens':
				include $_SERVER['DOCUMENT_ROOT'] . '/libaries/loginSystem/templates/accountgegevens.php';
				exit;
				break;

			case 'persoonsgegevens':
				include $_SERVER['DOCUMENT_ROOT'] . '/libaries/loginSystem/templates/persoonsgegevens.php';
				exit;
				break;

			default: \Error\ES::GetResponsCode(404);
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

					<table class="userInfo" cellspacing="0" cellpadding="0">
						<tbody>
						<tr>
							<td colspan="2">
								<h4>mijn accountgegevens</h4>
							</td>
						</tr>
						<tr>
							<th><span>E-mailadres:</span></th>
							<td><?php echo $user_info['email']; ?></td>
						</tr>
						<tr>
							<th><span>Wachtwoord:</span></th>
							<td><span>********</span></td>
						</tr>
						<tr>
							<td><a class="btn btn-primary" href="/mijn-gegevens/accountgegevens/">wijzigen</a></td>
						</tr>
						</tbody>
					</table>


					<table class="formLayout userInfo" cellspacing="0" cellpadding="0" summary="Persoonlijke gegevens" style="margin-top:12px;">
						<tbody>
						<tr>
							<td colspan="2">
								<h4>Mijn persoonsgegevens</h4>
							</td>
						</tr>
						<tr>
							<th><span>Klantnummer:</span></th>
							<td><?php echo $user_info['id']; ?> </td>
						</tr>
						<tr>
							<th><span>Nickname:</span></th>
							<td><?php echo $user_info['username']; ?></td>
						</tr>
						<tr>
							<th><span>Voornaam:</span></th>
							<td><?php echo $user_info['voornaam']; ?></td>
						</tr>
						<tr>
							<th><span>Voorletters:</span></th>
							<td><?php echo $user_info['voorletter']; ?></td>
						</tr>
						<tr>
							<th><span>Achternaam:</span></th>
							<td><?php echo $user_info['achternaam']; ?></td>
						</tr>
						<tr>
							<th><span>Geslacht:</span></th>
							<td><?php echo $user_info['geslacht']; ?></td>
						</tr>

						<tr>
							<th><span>Geboortedatum:</span></th>
							<td><?php  $phpdate = strtotime( $user_info['geboortedatum'] );
								echo	$mysqldate = date( 'd-m-Y', $phpdate ); ?></td>
						</tr>
						<tr>
							<th><span>Adres:</span></th>
							<td><?php echo $user_info['straat']; ?> </td>
						</tr>
						<tr>
							<th><span>Huisnummer:</span></th>
							<td><?php echo $user_info['huisnummer']; ?> </td>
						</tr>
						<tr>
							<th><span>Postcode:</span></th>
							<td><?php echo $user_info['postcode']; ?></td>
						</tr>
						<tr>
							<th><span>Woonplaats:</span></th>
							<td> <?php echo $user_info['woonplaats']; ?></td>
						</tr>
						<tr>
							<th><span>Tel. mobiel:</span></th>
							<td><?php echo $user_info['mobile']; ?></td>
						</tr>
						<tr>
							<th><span>Tel. thuis:</span></th>
							<td><?php echo $user_info['telefoon']; ?></td>
						</tr>
						<tr>
							<td><a class="btn btn-primary" href="/mijn-gegevens/persoonsgegevens/">wijzigen</a></td>
						</tr>
						</tbody>
					</table>
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
				} else {
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