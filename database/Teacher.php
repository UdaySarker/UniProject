<?php
require_once('DB.php');
class Teacher{
  private $db;
  public function __construct(){
    $this->db=new DB();
  }
  public function checkStLogin($data){
    header('Location:./student');
  }
  public function getStudent($data){
    $sql="SELECT * FROM student WHERE semester = '$data[getStudent]'";
    $stmt=$this->db->conn()->query($sql);
    return $stmt;
  }
}
 ?>
