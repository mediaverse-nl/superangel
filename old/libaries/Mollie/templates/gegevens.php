<?php

	$user_info = \Fr\LS::getUser('*');

if(empty($user_info['voornaam']) || empty($user_info['achternaam']) ||	empty($user_info['huisnummer']) ||
	empty($user_info['straat']) ||	empty($user_info['postcode']) || empty($user_info['woonplaats'])){

	$button = '<a class="btn btn-primary disabled">Volgende</a>';
}else{
	$button = '<a class="btn btn-primary" href="/kassa/betalen/">Volgende</a>';
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

    	<div class="container">

			<table class="formLayout userInfo" cellspacing="0" cellpadding="0" summary="Persoonlijke gegevens" style="margin-top:12px;">
				<tbody>
				<tr>
					<td colspan="2">
						<h4>Bezorgadres:</h4>
					</td>
				</tr>
				<tr>
					<td><?php echo $user_info['voornaam'] . ' ' . $user_info['tussenvoegsel'] . ' ' . $user_info['achternaam']; ?></td>
				</tr>
				<tr>
					<td><?php echo $user_info['straat'] . ' ' . $user_info['huisnummer']; ?> </td>
				</tr>
				<tr>
					<td><?php echo $user_info['postcode'] . ' ' . $user_info['woonplaats']; ?></td>
				</tr>
				<tr>
					<td><a class="btn btn-primary" href="/mijn-gegevens/persoonsgegevens/">wijzigen</a></td>
				</tr>
				</tbody>
			</table>
			<br>

			<a class="btn btn-primary" href="/winkelwagen/">Terug</a>

			<?php echo $button; ?>

			<br>
			<br>

    	</div> <!-- /container -->
    	
    	<!-- footer -->
		<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
		<!-- /footer -->
  
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="/js/bootstrap.js"></script>
	    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

	</body>
	
</html>