<?php

namespace Mollie;

class payment{

	public static function run($sql) {
		$db = \Singleton::getInstance();
		return $db->query($sql);
	}

	//
	public static function getOrderStatus($order_id){

		try{
			$qry = "SELECT * FROM orders WHERE payment_id = ?;";

			$sql = self::run($qry);

			$sql->bindValue(1, $order_id);

			$sql->execute();

			$row = $sql->fetch();

			return $row['paid'];

		}catch (Exception $e){
			echo $e->getMessage();
		}
	}

	public static function getAllProductFromOrder($user_id){
		try{

			$product_ids = array();

			$query = 'SELECT * FROM shopping_cart WHERE sc_user_id = ?;';

			$sql = self::run($query);

			$sql->bindValue(1, $user_id);

			$sql->execute();

			while($result = $sql->fetch()){
				$product_ids[] = $result;
			}

			return $product_ids;

		}catch(\Exception $e){
			echo $e;
		}
	}

	public static function updateOrderStatus($order_id, $status){

		try{
			$qry = "UPDATE orders SET paid = ? WHERE payment_id = ?;";

			$sql = self::run($qry);

			$sql->bindValue(1, $status);
			$sql->bindValue(2, $order_id);

			$sql->execute();

		}catch (Exception $e){
			echo $e->getMessage();
		}
	}


	public static function InsertOrder($order_id, $status, $user_id, $cartAmount, $description, $date){

		try{
			$qry = "INSERT INTO orders (paid, payment_id, user_id, amount, description, pay_date) VALUES ( ?, ?, ?, ?, ?, ?); ";

			$sql = self::run($qry);

			$sql->bindValue(1, $status);
			$sql->bindValue(2, $order_id);
			$sql->bindValue(3, $user_id);
			$sql->bindValue(4, $cartAmount);
			$sql->bindValue(5, $description);
			$sql->bindValue(6, $date);

			$sql->execute();

		}catch (Exception $e){
			echo $e->getMessage();
		}
	}

	public static function RemoveAllItemsFromCart($order_id){

		try{
			$qry = "DELETE FROM shopping_cart WHERE sc_user_id = ?";

			$sql = self::run($qry);

			$sql->bindValue(1, $order_id);

			$sql->execute();

		}catch (\Exception $e){
			echo $e->getMessage();
		}
	}


	public static function RemoveUnitFromProduct($product_id){

		try{
			$qry = "UPDATE products SET product_units = product_units - 1 WHERE product_id = ? ";

			$sql = self::run($qry);

			$sql->bindValue(1, $product_id);

			$sql->execute();

		}catch (\Exception $e){
			echo $e->getMessage();
		}
	}

	public static function insertOrderedProducts($product_id, $payment_id){

		try{
			$qry = "INSERT INTO ordered_products (op_id, op_payment_id, op_product_id) VALUES (NULL, ?, ?); ";

			$sql = self::run($qry);

			$sql->bindValue(1, $payment_id);
			$sql->bindValue(2, $product_id);

			$sql->execute();

		}catch (\Exception $e){
			echo $e->getMessage();
		}
	}


}



?>