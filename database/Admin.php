<?php
    require_once('DB.php');
    class Admin{
        private $db;
        public function __construct(){
            $this->db=new DB();
        }
        
    }
?>