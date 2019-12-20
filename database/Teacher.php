<?php
require_once('DB.php');
class Teacher{
  private $db;
  private $msg;
  public function __construct(){
    $this->db=new DB();
  }
  public function checkTLogin($data){
    if(empty($data['tUsername']) || empty($data['tPassword'])){
      $this->msg="Please Insert Teacher ID and Password";
    }elseif($data['type']!='3'){
      $this->msg="Please use student portal instead";
    }else{
      try{
        $sql="SELECT id,password,type FROM dbuser WHERE id=:tid AND password=:tpass AND type=:ttype LIMIT 1";
        $stmt=$this->db->conn()->prepare($sql);
        $stmt->bindParam(':tid',$data['tUsername']);
        $stmt->bindParam(':tpass',$data['tPassword']);
        $stmt->bindParam(":ttype",$data['type']);
        $stmt->execute();
        $exec=$stmt->fetch();
        if($stmt->rowCount()>0){
          $user=$exec['id'];
          session_start();
          $_SESSION['id']=$user;
          header('Location:./teacher/');
        }
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }
    return $this->msg;
  }
  public function getStudent($data){
    $sql="SELECT s.student_id,s.name,s.mobile,s.bloodgroup,s.email,st.semester_name FROM student s,semester st WHERE s.semester=st.semester_id AND st.semester_id=$data";
    $stmt=$this->db->conn()->query($sql);
    return $stmt;
  }
  public function getSemester(){
    $sql="SELECT * FROM semester";
    $stmt=$this->db->conn()->query($sql);
    return $stmt;
  }
  public function getDepartment(){
    $sql="SELECT * FROM department";
    $stmt=$this->db->conn()->query($sql);
    return $stmt;
  }
  public function getCourse(){
    $sql="SELECT * FROM course ";
    $stmt=$this->db->conn()->query($sql);
    return $stmt;
  }
  public function getStudentForAtt($data){
    $course=$data['course'];
    $sql="SELECT s.student_id,s.name, c.course_name FROM student s,course c WHERE c.course_id=s.taken_course AND s.taken_course=$course";
    $stmt=$this->db->conn()->query($sql);
    return $stmt;
  }
  public function setAtt($data){
    print_r($data);
  }
}
 ?>
