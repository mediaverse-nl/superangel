<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . "/libaries/Mollie/API/Autoloader.php";

/*
 * Initialize the Mollie API library with your API key.
 *
 * See: https://www.mollie.com/beheer/account/profielen/
 */
$mollie = new Mollie_API_Client;
$mollie->setApiKey("test_7CmTvT74EbGUxRuPvywdkhLTtM8bRf");
