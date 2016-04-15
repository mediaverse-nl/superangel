<?php
/*
 * Example 1 - How to prepare a new payment with the Mollie API.
 */

try
{
	/*
	 * Generate a unique order id for this example. It is important to include this unique attribute
	 * in the redirectUrl (below) so a proper return page can be shown to the customer.
	 */
	$order_id = 'tr_'.time();
	$user_id = \Fr\LS::getUser('id');
	$cartAmount = \Cart\SC::getCartAmount();
	$description = "Bestelling nummer ". str_replace("tr_", "", $order_id);

	/*
	 * Determine the url parts to these example files.
	 */
	$protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
	$hostname = $_SERVER['HTTP_HOST'];
	$path     = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);

	/*
	 * Payment parameters:
	 *   amount        Amount in EUROs. This example creates a € 10,- payment.
	 *   description   Description of the payment.
	 *   redirectUrl   Redirect location. The customer will be redirected there after the payment.
	 *   webhookUrl    Webhook location, used to report when the payment changes state.
	 *   metadata      Custom metadata that is stored with the payment.
	 */
	$payment = $mollie->payments->create(array(
		"amount"       => $cartAmount['shipping'],
		"description"  => $description,
		"redirectUrl"  => "{$protocol}://{$hostname}{$path}/bevesting/{$order_id}",
		"webhookUrl"   => "{$protocol}://{$hostname}{$path}/afronden/",
		"metadata"     => array(
			"order_id" => $order_id,
		),
	));

	/*
	 * In this example we store the order with its payment status in a database.
	 */
    \Mollie\payment::InsertOrder($order_id, $payment->status, $user_id, $cartAmount['shipping'], $description, date('Y-m-d H:i:s'));

	/*
	 * Send the customer off to complete the payment.
	 */
	header("Location: " . $payment->getPaymentUrl());
}
catch (Mollie_API_Exception $e)
{
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}

