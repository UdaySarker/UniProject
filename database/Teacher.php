<?php
require_once('DB.php');
class Teacher{
  private $db;
  public function __construct(){
    $this->db=new DB();
  }
  public function checkStLogin($data){
    header('Location:./teacher');
  }
  public function getStudent($data){
    $sql="SELECT s.student_id,s.name,s.mobile,s.bloodgroup,s.email,st.semester_name FROM student s,semester st WHERE s.semester=st.semester_id AND st.semester_id=$data[getStudent]";
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
