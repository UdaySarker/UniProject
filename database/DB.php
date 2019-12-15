<?php
  require_once('config.php');
  class DB{
    private $db;
    public function conn(){
      try{
        $this->db=new PDO('mysql:host='.HOST.';dbname='.DATABASE.';',USER,PASSWORD);
        $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
        echo $e->getMessage().$e->getFile();
      }
      return $this->db;
    }
  }
 ?>
