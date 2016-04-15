<?php

	//reset charset
	//default charset iso-8859-1
	header('Content-Type: text/html; charset=iso-8859-1');

	//load all classes
	require_once $_SERVER['DOCUMENT_ROOT'] . "/libaries/Singleton/class.database.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/libaries/loginSystem/class.logsys.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/libaries/cleanUrls/clean.urls.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/libaries/breadCrumbs/bread.crumbs.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/libaries/errorSystem/error.class.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/libaries/productSystem/product.class.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/libaries/ShoppingCartSystem/shopping.class.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/libaries/Mollie/class.mollie.php";

	// define url path
	$url = \Fr\CU::segment(1);

	//contruct login system
	\Fr\LS::construct();

	//check if the first segment is set or not
	//if not set create own segment
	if (!\Fr\CU::segment(1)){
		$page = 'shop';
	}else{
		$page = \Fr\CU::segment(1);
	}

	//check is file exists
	//if not set HTTP Response code
	if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/template/' . $page . '.php') || file_exists($_SERVER['DOCUMENT_ROOT'] . '/template/' . $page . '.xml')) {

		//choosing a template
		switch ($page) {

			//sitemap
			case 'sitemap' :
				include $_SERVER['DOCUMENT_ROOT'] . '/template/sitemap.php';
				break;
			// root first dir
			case $page :
				include $_SERVER['DOCUMENT_ROOT'] . '/template/' . $page . '.php';
				break;
		}

	} else {
		//send an error code to function
		\Error\ES::GetResponsCode(404);
	}

?>
