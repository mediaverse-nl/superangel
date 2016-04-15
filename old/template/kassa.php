<?php

	include $_SERVER['DOCUMENT_ROOT'] . "/libaries/Mollie/pages/initialize.php";

	$user_status = \Fr\LS::personalInfoChecker();

	if(\Fr\CU::segment(2) == 'gegevens'){
		if(\Fr\LS::$loggedIn == true){
			if($user_status == true){
				header('location: /kassa/bezorgen/');
			}else{
				//
				include $_SERVER['DOCUMENT_ROOT'] . '/libaries/Mollie/templates/gegevens.php';
			}
		}else{
			header('location: /inloggen/');
		}
		exit;

	}elseif(\Fr\CU::segment(2) == 'betalen') {
		//kortings code checken
		include $_SERVER['DOCUMENT_ROOT'] . '/libaries/Mollie/pages/01-new-payment.php';
		exit;

	}elseif(\Fr\CU::segment(2) == 'afronden'){
		//order bevestiging
		include $_SERVER['DOCUMENT_ROOT'] . '/libaries/Mollie/pages/02-webhook-verification.php';
		exit;

	}elseif(\Fr\CU::segment(2) == 'bevesting'){
		//order bevestiging
		include $_SERVER['DOCUMENT_ROOT'] . '/libaries/Mollie/pages/03-return-page.php';
		exit;

	}else{
		//default page
		header('location: /winkelwagen/');
	}

?>