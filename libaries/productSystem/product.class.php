<?php
namespace Product;

/**
.---------------------------------------------------------------------------.
|  Software:                                 |
|  Version: 0.4 (Last Updated on 2015 September 1)                          |
|  Contact: http://github.com/subins2000/logsys                             |
|  Documentation: https://subinsb.com/php-logsys                            |
'---------------------------------------------------------------------------'
*/

class PS extends \Singleton{

  private static function run($sql = NULL, $rowCount = NULL) {

    $db = \Singleton::getInstance();

    if($sql != NULL){
      return $db->query($sql);
    }elseif($rowCount != NULL){
      return $db->getLastInsertId();
    }

  }

  private static function userStatus(){
    if(\Fr\LS::$loggedIn == true){
      if(!\Fr\LS::getUser('status') == 1){
        \Error\ES::GetResponsCode(403);
      }
    }else{
      \Error\ES::GetResponsCode(403);
    }
  }

  //remove all relations and make new onces
  public static function product_facts($new = false){
    //empty product_facts table
    if($new == true){
      $sqlr = self::run("TRUNCATE product_facts");
      $sqlr->execute();

      //fetch all product data
      $sql = self::run("SELECT * FROM products");
      $sql->execute();

      //loop through resultset rows
      while ($row =  $sql->fetch(\PDO::FETCH_ASSOC)) {

        $facet_id = 1;
        //loop through table columns
        foreach ($row as $key => $value) {
          //create facts for all product fields except 'id' and 'name'
          if ($key != "product_id" && $key != "product_name" && $key != "product_desc" && $key != "product_status" && $key != "product_units" && $key != "product_price" && $key != "product_date" && $key != "product_code" && $key != "kleding" && $key != "kleding" ) {

            $sqlss = self::run("INSERT INTO product_facts VALUES (?, ?, ?, ?);");

            $sqlss->bindValue(1, $row['product_id']);
            $sqlss->bindValue(2, $facet_id);
            $sqlss->bindValue(3, html_entity_decode($key));
            $sqlss->bindValue(4, html_entity_decode($value));

            $sqlss->execute();

            $facet_id++;
          }
        }
        //end foreach
      }
      //end while
    }
    //end if
  }

  //filter systeem
  private static function filterPruducts($search){

    $search_exploded = explode (" ", $search );
    $x = 0;

    foreach( $search_exploded as $search_each ) {
      $x++;
      $construct = " ";

      if( $x == 1 ){
        $construct .= "AND product_desc LIKE '%$search_each%' OR product_name LIKE '%$search_each%'";
      }else{
        $construct .= "AND product_desc LIKE '%$search_each%' OR product_name LIKE '%$search_each%'";
      }
    }

    return $construct;
  }

  //retrive all product
  public static function getProducts(){

    //default values on vars
    $arguments = '';
    $link = '';
    $link_cate = '';
    $var = ' WHERE kleding = ? ';

    $arguments .= urldecode(\Fr\CU::segment(2)).'|';
    //
    if(isset($_GET['merken'])){
      $arguments .= ''.urldecode(str_replace('+', ' ', $_GET['merken'])).'|';
      $name[] = 'merken';
      $link .= 'merken='.urldecode($_GET['merken']).'&';
    }
    if(isset($_GET['maten'])){
      $arguments .= ''.urldecode(str_replace('+', ' ', $_GET['maten'])).'|';
      $name[] = 'maten';
      $link .= 'maten='.urldecode($_GET['maten']).'&';
    }
    if(isset($_GET['kleuren'])){
      $arguments .= ''.urldecode(str_replace('+', ' ', $_GET['kleuren'])).'|';
      $name[] = 'kleuren';
      $link .= 'kleuren='.urldecode($_GET['kleuren']).'&';
    }

    $array = explode('|', $arguments, -1);

    if(!empty($name)) {
      foreach($name as $key){
        if($key === end($name)){
          $var .= ' AND '.urlencode($key).' = ? ';
        }elseif($key === reset($name)){
          $var .= ' AND '.urlencode($key).' = ? ';
        }else{
          if(count($array) == 3){
            $var .= ' AND '.urlencode($key).' = ? ';
          }else{
            $var .=  ' AND '.urlencode($key).' = ? ';
          }
        }
      }
    }

    $qry = "SELECT *
            FROM product_facts pf
            LEFT JOIN products p ON pf.product_id = p.product_id
            LEFT JOIN product_img on pi_product_id = p.product_id
            ".$var."
            GROUP BY product_code, kleuren
            ORDER BY pf.facet_name DESC;";

    $product = '';

    if($sql = self::run($qry)) {

      $sql->execute($array);

      $product .= '<div class="col-lg-12" style="padding-right: 0px;">
                   <div class="" style=" padding: 10px; color: #777777; border-top: 1px dashed #D2D2D3; border-bottom: 1px dashed #D2D2D3; margin-left: 5px;">
                      '.$sql->rowCount().' artikelen
                     <div class="pull-right"></div>
                    </div>
                    <br>
                  </div>';

      while ($result = $sql->fetch()) {

        if($result['product_units'] != 0){
          $statusUnits = 'direct leverbaar';
        }else{
          $statusUnits = 'uitverkocht';
        }

        $product .= '<div class="col-lg-3" style="padding-right: 0px;">';
          $product .= '<div  style="border: 1px dashed #D2D2D3; margin: 0px 0px 0px 5px; padding: 5px; color: #777777;">';
            $product .= '<div>';
              $product .= '<a href="/product/'.$result['kleding'].'/'.$result['product_id'].'/"><img style="width: 100%; height: 280px;" src="/img/products/'.$result['pi_img_path'].'" /></a>';
            $product .= '</div>';
            $product .= '<div>';
              $product .= '<h4 title="" style="color: inherit">'.$result['product_name'].'</h4>';
              $product .= '<p class="lead pull-right">'.$result['product_price'].'</p>';
              $product .= '<p >'. $statusUnits .'</p>';
            $product .= '</div>';
          $product .= '</div>';
        $product .= '</div>';

      }
    }
    return $product;
  }


  //
  public static function getColors(){

    $ArrColor = array();

    if($sql = self::run('SELECT * FROM fecets_colorprint')){

      $sql->execute();

      while($row = $sql->fetch()) {

        $ArrColor[] = array(
            'id' => $row['fcp_id'],
            'name' => $row['fcp_name'],
            'img_path' => $row['fcp_img_path']
        );

      }
    }

  }

  //
  public static function InsertColors($img, $colorName){

    if($sql = self::run('INSERT INTO fecets_colorprint (fcp_id, fcp_name, fcp_img_path) VALUES (NULL, ?, ?);')){

      $sql->bindValue(1, $colorName);
      $sql->bindValue(2, $img);

      $sql->execute();

    }

  }

  ///
  public static function GetAllProductImgs($img_id, $units = 5){

    $sql = self::run("SELECT * FROM product_img WHERE pi_product_id = ? LIMIT 5;");

    $sql->bindValue(1, $img_id);

    $sql->execute();

    $default = 0;
    //default value
    $img_html = '';

    $img_html .= '<div class="slider-for col-lg-10" style="height: auto; margin-bottom: 50px;">';
    while($result = $sql->fetch()){
      $default++;
      $img_html .= '<img id="'.mb_substr($result['pi_img_path'], 0, 10).'" src="/img/products/'.$result['pi_img_path'].'" >';
    }
    $img_html .= '</div>';

    //sencond img
    $sql = self::run("SELECT * FROM product_img WHERE pi_product_id = ? LIMIT 5;");

    $sql->bindValue(1, $img_id);

    $sql->execute();

    //default value
    $img_html .= '<div class="slider-nav col-lg-2">';
    while($result = $sql->fetch()){
      $img_html .= '<img src="/img/products/'.$result['pi_img_path'].'" >';
    }
    $img_html .= '</div>';

    return $img_html;
  }

  private static function groupProduct($code, $product_color){

    try{
      $qry = 'SELECT *
              FROM products
              WHERE products.product_code = ? AND products.kleuren LIKE ? ;';

      $sql = self::run($qry);

      $sql->bindValue(1, $code);
      $sql->bindValue(2, "%$product_color%");

      $sql->execute();
      $html_size = '<select class="selectpicker" name="cart">';

        while($row = $sql->fetch(\PDO::FETCH_ASSOC)){
          if($row['product_units'] == 0){
            $html_size .= '<option disabled>maat '.$row['maten'].' - uitverkocht</option>';
          }elseif($row['product_units'] > 0){
            $html_size .= '<option type="text" value="'.$row['product_id'].'">maat '.$row['maten'].' - beschikbaar ('.$row['product_units'].')</option>';
          }
        }

      $html_size .= '</select>';

      return $html_size;

    }catch (PDOException $e) {
      return $e;
    }

  }

  public static function productRelations($product_code, $product_color, $path){

    $html_relations = '';

    try{

      $qry = 'SELECT *
                FROM products
                  LEFT JOIN product_img ON product_id = pi_product_id
                WHERE products.product_code = ? GROUP BY kleuren;';
                //WHERE products.product_code = ? AND products.kleuren NOT LIKE ? GROUP BY kleuren;';

      $sql = self::run($qry);

      $sql->bindValue(1, $product_code);
      //$sql->bindValue(2, "%$product_color%");

      $sql->execute();

      while($row = $sql->fetch()){
        if($product_color == $row['kleuren']){
          $html_relations .= '<a href="/product/'.$path.'/'.$row['product_id'].'/"><img style="width: 60px; height: 90px; overflow-y: hidden; border: 1px solid gray;" src="/img/products/'.$row['pi_img_path'].'" /></a>';
        }else{
          $html_relations .= '<a href="/product/'.$path.'/'.$row['product_id'].'/"><img style="width: 60px; height: 90px; overflow-y: hidden;" src="/img/products/'.$row['pi_img_path'].'" /></a>';
        }
      }

      return $html_relations;

    }catch(error $e) {
      return $e->printErrMsg();
    }
  }

  public static function createFacetedMemu(){

    //default values on vars
    $arguments = '';
    $link = '';
    $link_cate = '';
    $array = array();
    $var = ' WHERE kleding = ? ';

    //check if url segment is set
    if(\Fr\CU::segment(2)){
      $link_cate .= \Fr\CU::segment(2).'/?';
    }else{
      $link_cate .= \Fr\CU::segment(2).'?';
    }

    $arguments .= urldecode(\Fr\CU::segment(2)).'|';
    //
    if(isset($_GET['merken'])){
      $arguments .= ''.urldecode(str_replace('+', ' ', $_GET['merken'])).'|';
      $name[] = 'merken';
      $link .= 'merken='.urldecode($_GET['merken']).'&';
    }
    if(isset($_GET['maten'])){
      $arguments .= ''.urldecode(str_replace('+', ' ', $_GET['maten'])).'|';
      $name[] = 'maten';
      $link .= 'maten='.urldecode($_GET['maten']).'&';
    }
    if(isset($_GET['kleuren'])){
      $arguments .= ''.urldecode(str_replace('+', ' ', $_GET['kleuren'])).'|';
      $name[] = 'kleuren';
      $link .= 'kleuren='.urldecode($_GET['kleuren']).'&';
    }

    $array = explode('|', $arguments, -1);

    if(!empty($name)) {
      foreach($name as $key){
        if($key === end($name)){
          $var .= ' AND '.urlencode($key).' = ? ';
        }elseif($key === reset($name)){
          $var .= ' AND '.urlencode($key).' = ? ';
        }else{
          if(count($array) == 3){
            $var .= ' AND '.urlencode($key).' = ? ';
          }else{
            $var .=  ' AND '.urlencode($key).' = ? ';
          }
        }
      }
    }

    try{

      $sql = self::run("SELECT pf.facet_name, pf.value, COUNT( * ) AS c
                        FROM product_facts pf
                        LEFT JOIN products p ON pf.product_id = p.product_id
                        ".$var."
                        GROUP BY pf.facet_id, pf.value
                        ORDER BY pf.facet_name DESC;");

      $sql->execute($array);

      $data = array();

      while ($row = $sql->fetch()) {
        $itemName = $row["facet_name"];
        if (!array_key_exists($itemName, $data)) {
          $data[$itemName] = array();
        }
        $data[$itemName][] = $row;
      }

      echo '<div style=" padding: 10px; color: #777777; border-top: 1px dashed #D2D2D3; border-bottom: 1px dashed #D2D2D3; margin-left: 5px;"> Filter </div>';

      foreach ($data as $itemName => $rows) {

        if(isset($name)){
          foreach ($rows as $row) {
            if(in_array($itemName, $name) ){

              $newPath = substr($link, 0, -1);


              echo '<label><a class="btn btn-submit" href="/shop/'.substr($link_cate, 0, -1).$newPath.'">'.$row['value'].'</a></label> ';
            }
          }
        }
      }



      foreach ($data as $itemName => $rows) {

        if($itemName != 'kleding'){

          echo '<div class="widget-heading clearfix" style="color:#777777; ">
                  <h4><span>'.$itemName.'</span></h4>
                </div>';
          echo '<ul class="faceted" style="border-left: 3px solid #D2D2D3; list-style-type: none; padding-left: 15px; margin-left: 10px;">';

          foreach ($rows as $row) {
            echo  '<li data-option="'.$row["value"].'" style="color: #777;">
                      <span style="color: #777;">';
              if(isset($_GET[$itemName])){
                echo '<a style="color: #384248;">'.$row["value"].'</a>';
              }else{
                echo '<a href="/shop/' . $link_cate . $link . $itemName .'=' . $row["value"] . '">'.$row["value"].'</a>';
              }

             echo  '</span> <span class="pull-right">('.$row["c"].')</span>
                    </li>';
          }
          echo '</ul>';
        }
      }

    }catch (\Exception $e){
      return $e;
    }
  }

  //news
  public static function nextProduct($prev = false, $next = false){

    $item_id = \Fr\CU::segment(3);
    $count = 0;

    try{
      //query for prev button
      if($prev == true){
        $qry = 'SELECT * FROM products WHERE product_id <= ? GROUP BY product_code, kleuren ORDER BY product_id DESC LIMIT 2';
      }
      //query for next button
      if($next == true){
        $qry = 'SELECT * FROM products WHERE product_id >= ? GROUP BY product_code, kleuren ORDER BY product_id ASC LIMIT 2 ';
      }

      $sql = self::run($qry);

      $sql->bindValue(1, $item_id);

      $sql->execute();

      while($row = $sql->fetch()){
        if($item_id != $row['product_id']){
          $count++;
          return $row['product_id'];
        }
      }

      if($count == 0){
        return NULL;
      }



    } catch (PDOException $e) {
      return $e;
    }


  }


  public static function viewSingleProduct($GetProductNumber){

    try{
      $qry = 'SELECT *
              FROM products
              WHERE products.product_id = ? LIMIT 1;';

      $sql = self::run($qry);

      $sql->bindValue(1, $GetProductNumber);

      $sql->execute();

      if($sql->rowCount() == 0){
        return \Error\ES::GetResponsCode(404);
      }

      $product_html = '';

      $singleProduct_result = $sql->fetch();

      try{

        $qry1 = 'SELECT *, SUM( product_units ) AS count
                  FROM products
                  WHERE products.product_code = ? AND products.product_price = ?;';

        $sql1 = self::run($qry1);

        $sql1->bindValue(1, $singleProduct_result['product_code']);
        $sql1->bindValue(2, $singleProduct_result['product_price']);

        $sql1->execute();

        $row_result = $sql1->fetch();

        if($row_result['count'] == 0){
          $button = '<a class="btn btn-submit" disabled>Bestellen</a>';
        }else{
          $button = '<input class="btn btn-submit" type="submit" value="Bestellen" >';
        }

      }catch (\Exception $e){
        return $e;
      }

      $product_html .= '<form action="/winkelwagen/" method="get">';
        $product_html .= '<div class="col-lg-8" style="height: 100%;">'.self::GetAllProductImgs($singleProduct_result['product_id'], 5).'</div>';
        $product_html .= '<div class="col-lg-4">';
          $product_html .= '<h1>'.$singleProduct_result['product_name'].'</h1>';
          $product_html .= '<p>kleuren</p>';
          $product_html .= '<p>'.self::productRelations($singleProduct_result['product_code'], $singleProduct_result['kleuren'], $singleProduct_result['kleding']).'</p>';
          $product_html .= '<p>'.self::groupProduct($singleProduct_result['product_code'], $singleProduct_result['kleuren']).'</p>';
          $product_html .= '<span style="font-size: 30px" class="">'.str_replace('.00', ',-', $singleProduct_result['product_price']).'</span>';
          $product_html .= $button;
          $product_html .= '<hr style="margin: 5px;" />';
          $product_html .= '<a class="btn btn-submit">Wenslijst</a>';
          $product_html .= '<p>Productomschrijving</p>';
          $product_html .= '<p>'.$singleProduct_result['product_desc'].'</p>';
        $product_html .= '</div>';
      $product_html .= '</form>';

      return $product_html;

    } catch (PDOException $e) {
      return $e;
    }
  }

  //Get newest products
  public static function GetNewestProducts(){

    $sql = self::run("SELECT *
                      FROM products p
                      LEFT JOIN product_img on pi_product_id = p.product_id
                      GROUP BY product_code, kleuren DESC;");
    $sql->execute();

    //default value
    $html_newProduct = '';

    while($result = $sql->fetch()){
      if($result['product_units'] != 0){
        $statusUnits = 'direct leverbaar';
      }else{
        $statusUnits = 'uitverkocht';
      }

      $html_newProduct .= '<div class="col-lg-3" style="padding-right: 2px;">';
      $html_newProduct .= '<div  style="border: 1px dashed #D2D2D3; margin: 0px 0px 0px 5px; padding: 5px; color: #777777;">';
      $html_newProduct .= '<div>';
      $html_newProduct .= '<a href="/product/'.$result['kleding'].'/'.$result['product_id'].'/"><img style="width: 100%; height: 280px;" src="/img/products/'.$result['pi_img_path'].'" /></a>';
      $html_newProduct .= '</div>';
      $html_newProduct .= '<div>';
      $html_newProduct .= '<h4 title="" style="color: inherit">'.$result['product_name'].'</h4>';
      $html_newProduct .= '<p class="lead pull-right">'.$result['product_price'].'</p>';
      $html_newProduct .= '<p >'. $statusUnits .'</p>';
      $html_newProduct .= '</div>';
      $html_newProduct .= '</div>';
      $html_newProduct .= '</div>';

    }

    return $html_newProduct;
  }


  //////////////
  //////////////

  private static $config = array("pages" => array(
  /**
   */
      "breadcrumb_array" => array(
        //make your custom breadcrubs
          'pagina' => 'shop'
      )

  ));


  ////kleding
  ////kleuren
  ////merken
  ////maten


  public static function selectAllCates(){
    self::userStatus();
    try{

      $qry = "SELECT * FROM facets_categories GROUP BY fc_group";

      $sql = self::run($qry);

      $sql->execute();

      $html_cateMenu = '';

      while($result = $sql->fetch()){
        $html_cateMenu .= ''.$result['fc_group'];
      }

      return $html_cateMenu;

    }catch(\Exception $e) {
      return $e->printErrMsg();
    }
  }


  public static function createNewCate($table = NULL, $value = NULL ){
    self::userStatus();

    if($table == NULL && $value == NULL){
      try{
        $qry = "SELECT * FROM `localhost`.`facets_categories` GROUP BY fc_group;";

        $sql = self::run($qry);

        $sql->bindValue(1, $table);
        $sql->bindValue(2, $value);

        $sql->execute();

        $html_cates = '';

        while($result = $sql->fetch()){
          $html_cates .= $result['fc_group'].',';
        }

        return $html_cates;

      }catch(error $e) {
        return $e->printErrMsg();
      }
    }else{
      try{
        $qry = "SELECT * FROM `localhost`.`facets_categories` WHERE fc_group = ? AND fc_name = ?;";

        $sql = self::run($qry);

        $sql->bindValue(1, $table);
        $sql->bindValue(2, $value);

        $sql->execute();

        if($sql->rowCount() < 1){
          try{
            $qry = "INSERT INTO  `localhost`.`facets_categories` (
                `fc_id` ,
                `fc_group` ,
                `fc_name`
              )
              VALUES (
                NULL, ?, ?
              );";

            $sql = self::run($qry);

            $sql->bindValue(1, $table);
            $sql->bindValue(2, $value);

            $sql->execute();

          }catch(error $e) {
            return $e->printErrMsg();
          }
        }else{
          return 'Bestaat al!';
        }

      }catch(error $e) {
        return $e->printErrMsg();
      }
    }
  }
  //////////////
  //////////////


  //
  public static function GetMenuCate($type, $table){

    $sql = self::run("SELECT * FROM facets_categories WHERE fc_group = ? ORDER BY `fc_id`;");

    $sql->bindValue(1, $table);

    $sql->execute();

    $html_CategorieMenu = '';

    while($result = $sql->fetch()){

      switch ($type) {
        case 'option':
          $html_CategorieMenu .= '<option value="'.$result['fc_name'].'">'.$result['fc_name'].'</option>';
          break;
        case 'checkbox':
          $html_CategorieMenu .= '<label class="checkbox-inline"><input type="checkbox" name="maten[]" value="'.$result['fc_name'].'">'.$result['fc_name'].'</input></label>';
          break;
        case 'li':
          $html_CategorieMenu .= '<li><a href="/shop/'.$result['fc_name'].'/">'.$result['fc_name'].'</a></li>';
          break;
      }

    }
    return $html_CategorieMenu;
  }

  public static function imgUpload(){

    $expensions = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
    $location = '/img/products/'; // Upload directorys

    $errors = array();
    $paths = array();

    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
      // Loop $_FILES to exeicute all files
      foreach ($_FILES['img']['name'] as $f => $name) {

        $result = \Fr\LS::rand_string(10);

        $file_name = $_FILES['img']['name'][$f];
        $file_size = $_FILES['img']['size'][$f];
        $file_tmp = $_FILES['img']['tmp_name'][$f];

        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if(!in_array($file_ext, $expensions)){
          $errors[] = $file_ext."extension not allowed, please choose a JPEG or PNG file. / ".pathinfo($file_name, PATHINFO_EXTENSION);;
        }

        if($file_size > 2097152){
          $errors[] = 'File size must be excately 2 MB';
        }

        $compPath = $result.'.'.$file_ext;

        if(empty($errors) == true){

          if(move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'].$location.$compPath)){
            $paths[] = $compPath;
          }

        }else{
          return $errors;
        }

      }
      //end foreach
      return $paths;
    }
    //end _POST check
  }

  //insert images paths into database
  public static function imgPathToDataBase( $array = array(), $product_id){

    foreach($array as $key => $item){
      try{
        $sql = self::run("INSERT INTO `product_img` (pi_id, pi_product_id, pi_img_path) VALUES (NULL, ?, ?);");

        $sql->bindValue(1, $product_id);
        $sql->bindValue(2, $item);

        $sql->execute();

      }catch (PDOException $e) {
        return $e;
      }
    }
  }


  public static function insertProduct($other = array(), $img = array()){

    try{
      /* if there are other fields to add value to, make the query and bind values according to it */
      $keys   = array_keys($other);
      $columns = implode(", ", $keys);
      $colVals = implode(", :", $keys);

      $qry = "INSERT INTO `products` (product_id, {$columns}) VALUES (NULL, :{$colVals});";

      $sql = self::run($qry);

      foreach($other as $key => $value){
        $value = htmlspecialchars($value);
         $sql->bindValue(":$key", $value);
      }

      if($sql->execute()){

        $product_id = self::run(NULL, 1);

        self::insertNotifications('toegevoegd', self::getProductDetails($product_id)['product_name']);

        return $product_id;
      }else{
        return false;
      }

    }catch (PDOException $e) {
      echo $e;
    }

  }


  public static function getFacetedMenu(){
    $categories = array();

    //self::product_facts(true);

    $sql = self::run("SELECT pf.facet_name, pf.value, count(*) AS aantal
												FROM product_facts pf
											RIGHT	JOIN products p ON pf.product_id = p.id
											WHERE kleuren = 'black';
												GROUP BY pf.facet_id, pf.value
												ORDER BY pf.facet_name, pf.value;");

    $sql->bindValue(1, \Fr\CU::segment(2));

    $sql->execute();

    while($row = $sql->fetch(\PDO::FETCH_ASSOC)){
      $categories[$row['facet_name']][] = $row;
    }

    $html_faceted_menu = '';
    // any type of outout you like
    foreach($categories as $key => $category){

      //var_dump($categories);
      $html_faceted_menu .= '<div class="widget-heading clearfix"><h4><span>'.$key.'</span></h4></div>';

      foreach($category as $item){
        //	var_dump($categories);
        $html_faceted_menu .= '
          <li>
            <a>'.$item['value'].'</a>
            <span class="count">('.$item['aantal'].')</span>
          </li>';
      }
    }
    return $html_faceted_menu;
  }



  //admin function show all products in listing format
  public static function showAllProducts(){

    $qry = 'SELECT *
            FROM  `products`
            ORDER BY  `products`.`product_id` DESC
            LIMIT 10;';

    $sql = self::run($qry);

    $sql->execute();

    $sql->rowCount() == 0;

    $html_productList = '';

    while($result = $sql->fetch()){

      if($result['product_status'] == 0 ){
        $p_status = 'offline';
      }else{
        $p_status = 'online';
      }
      $date = $result['product_date'];

      $html_productList .= '<tr>';
        $html_productList .= '<td>'.$result['product_id'].'</td>';
        $html_productList .= '<td>'.$result['product_name'].'</td>';
        $html_productList .= '<td>'.$result['maten'].'</td>';
        $html_productList .= '<td>'.$result['product_units'].'</td>';
        $html_productList .= '<td>'.date_format(date_create($date), 'Y-m-d').'</td>';
        $html_productList .= '<td>'.$result['product_code'].'</td>';
        $html_productList .= '<td>'.$result['product_price'].'</td>';
        $html_productList .= '<td>'.$p_status.'</td>';
        $html_productList .= '<td>
                                <a href="/dashboard/product-wijzigen/?edit='.$result['product_id'].'"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
                                <a data-confirm="Weet je zeker dat je dit product('.$result['product_id'].') wilt verwijderen?" href="/dashboard/product-verwijderen/?remove='.$result['product_id'].'"><span class="glyphicon glyphicon-remove"></span></a>
                              </td>';
      $html_productList .= '</tr>';

    }
    return $html_productList;
  }

  //remove product only for admin users that are loggedin
  public static function removeProduct($value){

    self::userStatus();

    $result = self::getProductDetails($value);
    $name = $result['product_name'];

    $value = htmlentities($value);

    try{
      $qry = 'DELETE FROM `localhost`.`products` WHERE `products`.`product_id` = ?;';

      $sql = self::run($qry);
      $sql->bindValue(1, $value);

      if($sql->execute()){
        self::insertNotifications('verwijdert', $name);
        header('location: /dashboard/productenn/');
      }

    }catch(error $e) {
      $e->printErrMsg();
    }

  }


  //edit product only for admin users that are loggedin
  public static function editProduct($value, $toUpdate = array() ){
    self::userStatus();

    try{

      $columns = "";
      foreach($toUpdate as $k => $v){
        $columns .= "`$k` = :$k, ";
      }
      $columns = substr($columns, 0, -2); // Remove last ","

      $sql = self::run("UPDATE `localhost`.`products` SET {$columns} WHERE `product_id` = :id");

      $sql->bindValue(":id", $value);

      foreach($toUpdate as $key => $value){
        $value = htmlspecialchars($value);
        $sql->bindValue(":$key", $value);
      }

      $sql->execute();

    }catch(error $e) {
      $e->printErrMsg();
    }
    //end

  }


  //admin function to edit the product
  public static function getProductDetails($value){

    self::userStatus();

    try{

      $qry = 'SELECT * FROM products LEFT JOIN product_img ON pi_product_id = product_id WHERE product_id = ?;';

      $sql = self::run($qry);
      $sql->bindValue(1, $value);

      $sql->execute();

      while($result = $sql->fetch()){
        return $result;
      }

    }catch(error $e) {
      $e->printErrMsg();
    }
  }


  public static function sendQuestion($name, $email, $subject, $message){
    $qry = 'INSERT INTO  `localhost`.`contact`
						(`c_id`, `c_name`, `c_email`, `c_subject`, `c_message`)
						VALUES
						(NULL , ?, ?, ?, ?);';

    $sql = self::run($qry);

    $sql->bindValue(1, $name);
    $sql->bindValue(2, $email);
    $sql->bindValue(3, $subject);
    $sql->bindValue(4, $message);

    if($sql->execute()){
      self::insertNotifications('Bericht', $subject);
    }
  }

  private static function insertNotifications($action, $name){

    self::userStatus();

    try{

      $qry = 'INSERT INTO  `localhost`.`notifications` (
                `n_id` ,
                `n_datetime` ,
                `n_action` ,
                `n_name`
              )
              VALUES (
                NULL ,
                CURRENT_TIMESTAMP ,  ?,  ?
              );';

      $sql = self::run($qry);

      $sql->bindValue(1, $action);
      $sql->bindValue(2, $name);

      $sql->execute();

    }catch(error $e) {
      $e->printErrMsg();
    }

  }

  private static function strip_time($time){

    $created   = $time;
    $timeSecond = strtotime("now");
    $memsince   = $timeSecond - strtotime($created);

    if($memsince < 60) {
      $memfor = $memsince . " sec";
    }else if($memsince < 3600 && $memsince > 60){
      $memfor = floor($memsince / 60) . " min&nbsp;" . $memsince % 60 . " sec";
    }else if($memsince < 86400 && $memsince > 60){
      $memfor = floor($memsince / 3600) . " uren " . floor(($memsince / 60) % 60). " min&nbsp;";
    }else if($memsince < 604800 && $memsince > 3600){
      $memfor = floor($memsince / 86400) . " dagen";
    }else if($memsince < 2592000 && $memsince > 86400){
      $memfor = floor($memsince / 604800) . " weken";
    }else if($memsince > 604800){
      $memfor = floor($memsince / 2592000) . " maanden";
    }

    return (string) $memfor;
  }

  //retreve all notifications
  public static function getNotifications(){
    self::userStatus();

    try{
      $qry = 'SELECT *
                FROM  `notifications`
                ORDER BY  `notifications`.`n_id` DESC LIMIT 10';

      $sql = self::run($qry);

      $sql->execute();

      $html_notifi = '';

      while($result = $sql->fetch()){

        $html_notifi .= '<a href="#" class="list-group-item"">';
          $html_notifi .= '<i class="fa fa-comment fa-fw"></i>'.$result['n_action'].' - ('.$result['n_name'].')';
          $html_notifi .= '<span class="pull-right text-muted small">';
           $html_notifi .= '<em>'.self::strip_time($result['n_datetime']).'</em>';
          $html_notifi .= '</span>';
        $html_notifi .= '</a>';

      }
      return $html_notifi;

    }catch(error $e) {
      $e->printErrMsg();
    }

  }

  public static function insertBrands($name){

    $qry = 'INSERT INTO  `localhost`.`product_brands` (
              `pb_id` ,
              `pb_name`
            )
            VALUES (
                NULL ,  ?
            );';

    $sql = self::run($qry);

    $sql->bindValue(1, $name);

    $sql->execute();

  }

  public static function getClientMessages(){

    $qry = 'SELECT *
            FROM (
              SELECT *
              FROM contact
              ORDER BY c_id DESC
            ) AS sq
            ORDER BY c_status ASC LIMIT 20;';

    $sql = self::run($qry);

    $sql->execute();

    $html_contact = '';

    while($result = $sql->fetch()){

      $html_contact .= '<tr>';
      $html_contact .= '<td>'.$result['c_id'].'</td>';
      $html_contact .= '<td>'.$result['c_email'].'</td>';
      $html_contact .= '<td>'.$result['c_date_time'].'</td>';
      $html_contact .= '<td>'.$result['c_subject'].'</td>';

      if($result['c_status'] == 0){
        $html_contact .= '<td><a href="/mijn-klantenservice/?email='.$result['c_id'].'/"><span class="glyphicon glyphicon-envelope"></span></a></td>';
      }elseif($result['c_status'] == 1){
        $html_contact .= '<td><a href="/mijn-klantenservice/?email='.$result['c_id'].'/"><span class="glyphicon glyphicon-ok"></span></a></td>';
      }

      $html_contact .= '</tr>';
    }
    return $html_contact;
  }

  private static function updateMailStatus($email_id){

    $qry = "UPDATE  `localhost`.`contact` SET  `c_status` =  1 WHERE  `contact`.`c_id` = ?;";

    $sql = self::run($qry);

    $sql->bindValue(1, $email_id);

    $sql->execute();
  }


  public static function getSingleMail($email_id){

    $qry = 'SELECT * FROM contact WHERE c_id = ?';

    $sql = self::run($qry);

    $sql->bindValue(1, $email_id);

    if($sql->execute()){
      self::updateMailStatus($email_id);
    }

    $result = $sql->fetch();

    return $result;

  }

  public static function countUnreedMail(){
    $qry = 'SELECT * FROM contact WHERE c_status = 0';

    $sql = self::run($qry);

    $sql->execute();

    $count = $sql->rowCount();

    return $count;

  }

}

