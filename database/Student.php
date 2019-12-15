<?php
  require_once('DB.php');
  class Student{
    private $db;
    public function __construct(){
      $this->db=new DB();
    }
    public function checkStLogin($data){
      header('Location:./student');
    }
  }
 ?>
