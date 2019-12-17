<?php
    require_once('DB.php');
    class Admin{
        private $db;
        public $msg;
        public function __construct(){
            $this->db=new DB();
        }
        public function checkData($data){
            $sid=filter_var($data['sid'],FILTER_VALIDATE_INT);
            $sname=filter_var($data['sname'],FILTER_SANITIZE_STRING);
            $semester=$data['semid'];
            $mobile=filter_var($data['mobile'],FILTER_SANITIZE_STRING);
            $bloodgroup=filter_var($data['bloodgroup'],FILTER_SANITIZE_STRING);
            $email=filter_var($data['mobile'],FILTER_SANITIZE_EMAIL);
            if(empty($sid)||empty($sname)||empty($semester)||empty($mobile)||empty($bloodgroup)||empty($email)){
                $this->msg="Empty field not allowed";
            }else{
                return false;
            }
        }
        public function insertStudent($data){
            $data=$this->checkData($data);
            if($data){
                print_r($data);
            }else{
                return $this->msg;
            }
        }
    }
?>