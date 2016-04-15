<?php
namespace Cart;

/**
*/

class SC extends \Singleton {

  /**
   * ------------
   * BEGIN CONFIG
   * ------------
   * Edit the configuraion
   */

  public static $default_config = array(
      "shipping_cost" => 7.50,
      "TAX" => 21
  );

  public static function run($sql) {
    $db = \Singleton::getInstance();
    return $db->query($sql);
  }

  public static function removeItemFromCart($min){
    try{
      $qry = 'DELETE FROM `shopping_cart` WHERE `shopping_cart`.`sc_id` = ?;';

      $sql = self::run($qry);

      $sql->bindValue(1, $min);

      $sql->execute();

      return header('location: /winkelwagen/');
    }catch (\Exception $e){
      return $e->getMessage();
    }
  }

  public static function AddItemToCart($plus){
    try{
      $qry = 'INSERT INTO shopping_cart( sc_product_id, sc_user_id )

			SELECT sc_product_id, sc_user_id
			FROM shopping_cart
			WHERE sc_id = ?;';

      $sql = self::run($qry);

      $sql->bindValue(1, $plus);

      $sql->execute();

      return header('location: /winkelwagen/');
    }catch(\Exception $e){
      return $e->getMessage();
	}
  }

  public static function myItems(){


    $qry = 'SELECT * FROM products LEFT JOIN product_categories ON pc_id = product_cate WHERE product_cate = ?;';

    $sql = self::run($qry);

    $sql->bindValue(1, $cate_id);
    $sql->execute();

    $result = $sql->fetch();

    return '/product/'.$result['pc_name'].'/';

  }

  public static function GetProductCate($cate_id){

    $qry = 'SELECT * FROM products LEFT JOIN product_categories ON pc_id = product_cate WHERE product_cate = ?;';

    $sql = self::run($qry);

    $sql->bindValue(1, $cate_id);
    $sql->execute();

    $result = $sql->fetch();

    return '/product/'.$result['pc_name'].'/';
  }

  public static function cartItems(){

    $html_cartItems = '';
    $user_id = \Fr\LS::getUser('id');

    try{
      $qry = 'SELECT
                DISTINCT(sc_product_id)
                  AS id,
                count(sc_product_id)
                  AS count,
                SUM(product_price)
                  AS total_cost,
                product_id,
                product_name,
                maten,
                product_price,
                sc_id,
                kleding
                FROM shopping_cart
                  LEFT JOIN products
                    ON product_id = sc_product_id
              WHERE sc_user_id = ?
              GROUP BY sc_user_id, sc_product_id
              HAVING (count > 0);';

      $sql = self::run($qry);

      $sql->bindValue(1, $user_id);

      $sql->execute();

      $count_items = $sql->rowCount();

      while($result = $sql->fetch()){

        $min = 'href="/winkelwagen/?min='.$result['sc_id'].'/"';
        $plus = 'href="/winkelwagen/?plus='.$result['sc_id'].'/"';

        if($result['count'] == 1){
          $min = 'disabled="disabled"';
        }else if($result['count'] > 9){
          $plus = 'disabled="disabled"';
        }

        $html_cartItems .= '<tr class="cart_item ">';
          $html_cartItems .= '<td class="product-thumbnail">';
            $html_cartItems .= '<a href="/product/'.$result['kleding'].'/'.$result['product_id'].'/">';
              $html_cartItems .= '<img style="height: 100px" src="/img/products/'.self::cartImg($result['product_id']).'" class="cart_img">';
            $html_cartItems .= '</a>';
          $html_cartItems .= '</td>';
          $html_cartItems .= '<td class="product-name">';
            $html_cartItems .= '<a href="/product/'.$result['kleding'].'/'.$result['product_id'].'/">'.mb_strimwidth($result['product_name'], 0, 25 ).'</a>';
          $html_cartItems .= '</td>';
          $html_cartItems .= '<td class="product-price">';
            $html_cartItems .= '<span class="amount">'.$result['product_price'].'</span>';
          $html_cartItems .= '</td>';
          $html_cartItems .= '<td class="product-price">';
            $html_cartItems .= '<span class="amount">'.$result['maten'].'</span>';
          $html_cartItems .= '</td>';
          $html_cartItems .= '<td class="product-quantity">';
              $html_cartItems .= '<div class="input-group " style="width: 55px;">
                                    <span class="input-group-btn">
                                        <a class="btn btn-default" '.$min.' >
                                            <span class="glyphicon glyphicon-minus"></span>
                                        </a>
                                    </span>
                                    <span class="" style="font-size: 14px;line-height: 22px; padding: 5px;">'.$result['count'].'</span>
                                    <span class="input-group-btn">
                                        <a class="btn btn-default" '.$plus.'>
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                    </span>
                                  </div>';
            $html_cartItems .= '<div class="qty-adjust"><a class="qty-plus" href="#"><i class="fa-chevron-up"></i></a><a class="qty-minus" href="#"><i class="fa-chevron-down"></i></a></div></div>';
          $html_cartItems .= '</td>';
          $html_cartItems .= '<td class="product-subtotal">';
            $html_cartItems .= '<span class="amount">'.$result['total_cost'].'</span>';
          $html_cartItems .= '</td>';
          $html_cartItems .= '<td class="product-remove">';
            $html_cartItems .= '<a href="/winkelwagen/?remove='.$result['product_id'].'" class="remove" title="Remove this item"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> </a>';
          $html_cartItems .= '</td>';
        $html_cartItems .= '</tr>';

      }
      return $html_cartItems;

    } catch (PDOException $e) {
      return $e;
    }

  }

  public static function addOrRemoveUnit($product_id, $unit){

    $user_id = \Fr\LS::getUser('id');

    if($unit == 'remove'){
      $qry = 'SELECT * FROM  `shopping_cart` WHERE sc_product_id = ? AND sc_user_id = ? LIMIT 1';
    }

    if($unit == 'add'){
      $qry = 'DELETE FROM `shopping_cart` WHERE `shopping_cart`.`sc_id` = 39';
    }

    if($unit == 'add'){
      $qry = 'INSERT INTO  `localhost`.`shopping_cart` (
              `sc_id` ,
              `sc_user_id` ,
              `sc_product_id`
              )
              VALUES (
              NULL ,  ?,  ?
              );';
    }

    $sql = self::run($qry);

    $sql->bindValue(1, $product_id);
    $sql->bindValue(2, $user_id);


    $sql->execute();

  }

  public static function cartImg($img_id){

    try{
      $sql = self::run("SELECT * FROM product_img WHERE pi_product_id = ? LIMIT 1;");

      $sql->bindValue(1, $img_id);

      $sql->execute();

      $row = $sql->fetch();

      return $row['pi_img_path'];

    }catch (Exception $e){
      return $e->getMessage();
    }

  }

  public static function countTotalProducts(){

    $user_id = \Fr\LS::getUser('id');

    $qry = 'SELECT * FROM shopping_cart WHERE sc_user_id = ? ';
    $sql = self::run($qry);

    $sql->bindValue(1, $user_id);

    $sql->execute();

    $count_items = $sql->rowCount();

    return $count_items;
  }

  public static function countProductSessions(){
    //array_sum($_SESSION['shopping_cart']);
  }

  public static function updateCart($toUpdate = array(), $video_id){

    //check if loggedin and if account is valid
    if(is_array($toUpdate) && \Fr\LS::$loggedIn == true && \Fr\LS::getUser('type') == 1 ){

      $columns = "";
      foreach($toUpdate as $k => $v){
        $columns .= "`$k` = :$k, ";
      }
      $columns = substr($columns, 0, -2); // Remove last ","

      $sql = self::run("UPDATE  `xeedus`.`video` SET {$columns} WHERE  `video`.`v_id`=:v_id");
      $sql->bindValue(":v_id", $video_id);

      foreach($toUpdate as $key => $value){
        $value = htmlspecialchars($value);
        $sql->bindValue(":$key", $value);
      }

      if($sql->execute()){
      }
    }else{
      return false;
    }
  }

  public static function getCartAmount(){

    $user_id = \Fr\LS::getUser('id');

    $sql = self::run('SELECT SUM(product_price) as total_cost FROM products RIGHT JOIN shopping_cart ON sc_product_id = product_id where sc_user_id = ?');
    $sql->bindValue(1, $user_id);

    $sql->execute();

    $result = $sql->fetch();

    if($result['total_cost'] == NULL){
      return '0.-';
    }else{

      $cartCost = str_replace('.00', ',-', $result['total_cost']);

      $subtotal = (self::$default_config['shipping_cost'] + $cartCost);

      return array(
            'shipping' => sprintf("%0.2f",$subtotal),
            'cart' => sprintf("%0.2f",$cartCost)
          );

    }
  }


  //insert into shopping cart
  public static function InsertInCart($product_id){

    if(\Fr\LS::$loggedIn == true){
      $user_id = \Fr\LS::getUser('id');

      $qry = 'INSERT INTO shopping_cart (sc_id, sc_user_id, sc_product_id) VALUES (NULL, ?, ?);';

      $sql = self::run($qry);

      $sql->bindValue(1, $user_id);
      $sql->bindValue(2, $product_id);

      $sql->execute();

      header('location: /winkelwagen/');
    }else{

    }

  }

  public static function getInvoiceDetails($payment_id){

    try{
      $qry = "SELECT * FROM ordered_products LEFT JOIN products ON op_product_id = product_id WHERE op_payment_id = ?";

      $resultArr = array();

      $sql = self::run($qry);

      $sql->bindValue(1, $payment_id);

      $sql->execute();

      while($row = $sql->fetch()){
        $resultArr[] = $row;
      }

      return $resultArr;

    }catch (\Exception $e){
      echo $e->getMessage();
    }

  }

  public static function removeFromCart($remove){

    $remove = htmlentities($remove);
    $user_id = \Fr\LS::getUser('id');

    $qry = 'DELETE FROM `shopping_cart` WHERE `shopping_cart`.`sc_user_id` = ? AND `sc_product_id` = ?;';

    $sql = self::run($qry);

    $sql->bindValue(1, $user_id);
    $sql->bindValue(2, $remove);

    $sql->execute();

    header('location: /winkelwagen/');
  }


  //view my orders
  public static function GetOrders($user_id){

    try{

      $html = array();

      $sql = self::run('SELECT * FROM orders WHERE user_id = ?;');

      $sql->bindValue(1, $user_id);

      $sql->execute();

      while($result = $sql->fetch()){
         $html[] = $result;
      }

      return $html;

    }catch (\Exception $e){
      return $e->getMessage();
    }


  }



}

