<?php

/**
 * Class Singleton Version 1.2
 * Date: 14/12/2015
 * Author: Deveron Reniers
 * Company: Mediaverse
 * Rights reserved
 */

class Singleton{

    //array with database credentials
    private static $config = array(
      "host" => "localhost",
      "port" => 3306,
      "username" => "root",
      "password" => "",
      "name" => "superangel"
    );

    //block access to db variable and instance
    private $_db;
    private static $_instance;

    //construct connection with PDO
    private function __construct()
    {
      try{
        $this->_db = new \PDO("mysql:dbname=". self::$config['name'] .";host=". self::$config['host'] .";port=". self::$config['port'], self::$config['username'], self::$config['password']);;//<-- connect here
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch(\PDOException $e) {
        throw $e;
      }
    }

    //get static instance
    public static function getInstance()
    {
      if (!(self::$_instance instanceof self)) {
        self::$_instance = new self();
      }
      return self::$_instance;
    }

    //prepare function call
    public function query($sql)
    {
      return $this->_db->prepare($sql);
    }

    //
    public function getLastInsertId()
    {
        return $this->_db->lastInsertId();
    }

    //disable clone
    private function __clone()
    {
      return false;
    }

    //disable wakeup
    public function __wakeup()
    {
      return false;
    }

  }

?>