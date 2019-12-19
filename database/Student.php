<?php
  require_once('DB.php');
  class Student{
    private $db;
    private $msg;
    public function __construct(){
      $this->db=new DB();
    }
    public function checkStLogin($data){
      if(empty($data['stUsername']) || empty($data['stPassword'])){
        $this->msg="Please Insert Student ID and Password";
      }else{
        try{
          $sql="SELECT id,password,type FROM dbuser WHERE id=:sid AND password=:spass AND type=:stype LIMIT 1";
          $stmt=$this->db->conn()->prepare($sql);
          $stmt->bindParam(':sid',$data['stUsername']);
          $stmt->bindParam(':spass',$data['stPassword']);
          $stmt->bindParam(":stype",$data['type']);
          $stmt->execute();
          $exec=$stmt->fetch();
          if($stmt->rowCount()>0){
            $user=$exec['id'];
            session_start();
            $_SESSION['id']=$user;
            header('Location:./student/');
          }
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }
      return $this->msg;
    }
    public function getGpa($id){
      try{
        $sql="SELECT student_result.student_semester,semester.semester_name,student_result.student_gpa FROM student_result JOIN semester ON student_result.student_semester=semester.semester_id WHERE student_result.student_id=:id";
        $stmt=$this->db->conn()->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOException $e){
        $e->getMessage();
      }
    }
    public function getAllByStudent($id){
      try{
        $sql="SELECT semester FROM student WHERE student_id=:id";
        $stmt=$this->db->conn()->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $exec=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $exec;
      }catch(PDOException $e){
        $e->getMessage();
      }
    }
  }
 ?>
