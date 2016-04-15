<?php
/*
 * Example 3 - How to show a return page to the customer.
 *
 * In this example we retrieve the order stored in the database.
 * Here, it's unnecessary to use the Mollie API Client.
 */

$order_id = \Fr\CU::segment(3);
$status = \Mollie\payment::getOrderStatus($order_id);
$user_id = \Fr\LS::getUser('id');

if($status == "paid"){
    // update order for admin

    // insert all product into ordered_products

    $product_ids = \Mollie\payment::getAllProductFromOrder($user_id);

    //update
    //for each product min x unit(s) where product is product_id
    foreach($product_ids as $key){
        //insert products to orders
        \Mollie\payment::insertOrderedProducts($key['sc_product_id'], $order_id);
        //remove unit(s) after payment is succeded
        \Mollie\payment::RemoveUnitFromProduct($key['sc_product_id']);
    }

    \Mollie\payment::RemoveAllItemsFromCart($user_id);

    //header('location: /mijn-bestelling/'. $order_id . '/');
}



/*
 * Determine the url parts to these example files.
 */
$protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
$hostname = $_SERVER['HTTP_HOST'];
$path     = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);

echo "<p>Your payment status is '" . htmlspecialchars($status) . "'.</p>";
echo "<p>";

echo '<a href="' . $protocol . '://' . $hostname . '/kassa/betalen/">opnieuw proberen</a><br>';
echo '<a href="/mijn-bestelling/'.$order_id. '">Bekijk uw factuur.</a><br>';

echo "</p>";

?>