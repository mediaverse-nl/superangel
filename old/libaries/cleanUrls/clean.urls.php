<?php

namespace Fr;

class CU {

  static $site_path;

  function __construct($site_path){
    self::$site_path = removeSlash(self::$site_path);
  }

  public function __toString(){
    return self::$site_path;
  }

  private function removeSlash($string){
    if ($string[strlen($string) - 1] == '/')
      $string = rtrim($string, '/');

    return $string;
  }

  public static function segment($segment = 1){
    $url = str_replace(self::$site_path, '?', $_SERVER['REQUEST_URI']);
    $url = explode('/', $url);

    if (isset($url[$segment]))
      return $url[$segment];
    else
      return false;

    return $url;
  }

}