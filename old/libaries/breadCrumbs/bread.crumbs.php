<?php

namespace Fr;

class BC {

  private static $config = array("pages" => array(

      "breadcrumb_array" => array(
        //make your custom breadcrubs
          'shop' => 'shop',
          'categorie/product' => 'product',
          'winkelwagen' => 'winkelwagen',
          'contact' => 'contact',
          'mijn-gegevens' => 'mijn-gegevens',
          'registreren' => 'registreren',
          'FAQ' => 'faq',
          'contact' => 'contact'
      )

  ));

  public static function breadcrumbs($url)
  {
    //first segment of the browser is used to know the locatio
    $current_url = \Fr\CU::segment(1);
    //search for a metch between var current_url and the array
    //array can be hound in the top of this page at the pages array
    $new = array_search($current_url, self::$config['pages']['breadcrumb_array']);

    //split all segments in to parts
    $new_arr = explode('/', $new);
    $new_arr = str_replace("-", " ", $new_arr);

    $arr_count = count($new_arr);
    $item = 0;

    $htmlCrumb = '<br >';
    $htmlCrumb .= '<ol class="breadcrumb breadcrumb-arrow pull-right">';

    if (!\Fr\CU::segment(1)) {
      $htmlCrumb .= '<li class="active"><a">Shop</a></li>';
    } elseif (\Fr\CU::segment(1) == 'shop') {

      if(\Fr\CU::segment(2)) {
        $htmlCrumb .= '<li><a href="/shop/">Shop</a></li>';
        $htmlCrumb .= '<li class="active">' . \Fr\CU::segment(2) . '</li>';
      }else{
        $htmlCrumb .= '<li class="active"><a">Shop</a></li>';
      }

    } else {
      $htmlCrumb .= '<li><a href="/shop/">Shop</a></li>';
      foreach ($new_arr as $i => $key) {
        //1 count for each segment
        if(++$item === $arr_count){
          $htmlCrumb .= '<li class="active">' . $key . '</li>';
        }else{

          if($key == 'categorie' && $item == 1){
            $htmlCrumb .= '<li><a href="/shop/'.\Fr\CU::segment(2).'/">'.\Fr\CU::segment(2).'</a></li>';
          }else{
            $htmlCrumb .= '<li><a href="/' . $key = str_replace(" ", "-", $key) . '/">' . $key .'</a></li>';
          }
        }
      }
    }

    $htmlCrumb .= '</ol>';
    //return value to the location for the function
    return $htmlCrumb;
  }

}