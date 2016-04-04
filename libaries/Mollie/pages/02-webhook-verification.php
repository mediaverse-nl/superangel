<?php
/*
 * Example 2 - How to verify Mollie API Payments in a webhook.
 */

try
{
	/*
	 * Retrieve the payment's current state.
	 */
	$payment  = $mollie->payments->get($_POST['id']);
	$order_id = $payment->metadata->order_id;
	$user_id = \Fr\LS::getUser('id');

	/*
	 * Update the order in the database.
	 */
	\Mollie\payment::updateOrderStatus($order_id, $payment->status);


	$payment = \Mollie\payment::checkPayStatus($order_id);

	if($payment == "paid"){
		/*
		 * At this point you'd probably want to start the process of delivering the product to the customer.
		 */
	}
	elseif ($payment->isOpen() == FALSE)
	{
		/*
		 * The payment isn't paid and isn't open anymore. We can assume it was aborted.
		 */
	}
}
catch (Mollie_API_Exception $e)
{
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}
