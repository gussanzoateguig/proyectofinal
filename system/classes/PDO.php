<?php

  require_once 'system/config/database.php';

  class database extends PDO {

    private $con;

    public function __construct() {
        try {
          $this->con = new PDO('mysql:host='.MYSQL_DATA['server'].';dbname='.MYSQL_DATA['db'], MYSQL_DATA['username'], MYSQL_DATA['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
        }

    }

    public function getConnection() {
      return $this->con;
    }

    public function __destruct() {
      $this->con = null;
    }

  }

?>
