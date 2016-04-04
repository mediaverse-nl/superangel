<?php

	$status = \Fr\LS::personalInfoChecker();

	if(\Fr\LS::$loggedIn == true && \Fr\LS::getUser('status') == 1){

		$UrlPart = \Fr\CU::segment(2);

		switch($UrlPart){
			//
			case 'producten' :
				include $_SERVER['DOCUMENT_ROOT'] . '/libaries/adminPanel/pages/producten.php';
				break;

			case 'product-toevoegen' :
				include $_SERVER['DOCUMENT_ROOT'] . '/libaries/adminPanel/pages/product-toevoegen.php';
				break;

			case 'product-verwijderen' :
				include $_SERVER['DOCUMENT_ROOT'] . '/libaries/adminPanel/pages/product-verwijderen.php';
				break;

			case 'product-wijzigen' :
				include $_SERVER['DOCUMENT_ROOT'] . '/libaries/adminPanel/pages/product-wijzigen.php';
				break;

			case 'mail-inbox' :
				include $_SERVER['DOCUMENT_ROOT'] . '';
				break;

			case 'read-mail' :
				include $_SERVER['DOCUMENT_ROOT'] . '';
				break;

			case 'nieuw-mail' :
				include $_SERVER['DOCUMENT_ROOT'] . '/libaries/adminPanel/pages/nieuw-mail.php';
				break;

			case 'mail-junk' :
				include $_SERVER['DOCUMENT_ROOT'] . '';
				break;

			case 'orders' :
				include $_SERVER['DOCUMENT_ROOT'] . '';
				break;

			case 'index' :
				include $_SERVER['DOCUMENT_ROOT'] . '/libaries/adminPanel/pages/index.php';
				break;

			default: include $_SERVER['DOCUMENT_ROOT'] . '/libaries/adminPanel/pages/index.php';
		}

	}else{
		\Error\ES::GetResponsCode(403);
	}


?>