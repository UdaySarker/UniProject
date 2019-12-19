<?php
    require_once('DB.php');
    class Admin{
        private $db;
        public $msg;
        public function __construct(){
            $this->db=new DB();
        }
        public function checkAdLogin($data){
          if(empty($data['adUsername']) || empty($data['adPassword'])){
            $this->msg="Please Insert Admin ID and Password";
          }elseif($data['type']!='2'){
            $this->msg="Please use student portal instead";
          }else{
            try{
              $sql="SELECT id,password,type FROM dbuser WHERE id=:sid AND password=:spass AND type=:stype LIMIT 1";
              $stmt=$this->db->conn()->prepare($sql);
              $stmt->bindParam(':sid',$data['adUsername']);
              $stmt->bindParam(':spass',$data['adPassword']);
              $stmt->bindParam(":stype",$data['type']);
              $stmt->execute();
              $exec=$stmt->fetch();
              if($stmt->rowCount()>0){
                $user=$exec['id'];
                session_start();
                $_SESSION['id']=$user;
                header('Location:./Admin/');
              }
            }catch(PDOException $e){
              echo $e->getMessage();
            }
          }
          return $this->msg;
        }
        private function checkData($data){
            $sid=filter_var($data['sid'],FILTER_VALIDATE_INT);
            $sname=filter_var($data['sname'],FILTER_SANITIZE_STRING);
            $semester=$data['semid'];
            $mobile=filter_var($data['mobile'],FILTER_SANITIZE_STRING);
            $bloodgroup=filter_var($data['bloodgroup'],FILTER_SANITIZE_STRING);
            $email=filter_var($data['email'],FILTER_SANITIZE_EMAIL);
            if(empty($sid)||empty($sname)||empty($semester)||empty($mobile)||empty($bloodgroup)||empty($email)){
                $this->msg="Empty field not allowed";
                return false;
            }else{
              $data=['sid'=>$sid,
                      'sname'=>$sname,
                      'semester'=>$semester,
                      'mobile'=>$mobile,
                      'bloodgroup'=>$bloodgroup,
                      'email'=>$email];
              return $data;
            }
        }
        public function insertStudent($data){
            $data=$this->checkData($data);
            if($data){
              try{
                $sql="INSERT INTO student(student_id,name,semester,mobile,bloodgroup,email) VALUES(:sid,:sname,:sem,:mob,:bg,:email)";
                $stmt=$this->db->conn()->prepare($sql);
                $stmt->bindParam(':sid',$data['sid']);
                $stmt->bindParam(':sname',$data['sname']);
                $stmt->bindParam(':sem',$data['semester']);
                $stmt->bindParam(':mob',$data['mobile']);
                $stmt->bindParam(':bg',$data['bloodgroup']);
                $stmt->bindParam(':email',$data['email']);
                $exec=$stmt->execute();
                if($exec){
                  $this->msg="Student Added Succesfully";
                }else{
                    $this->msg= "something went wrong";
                }
              }catch(PDOException $e){
                echo $e->getMessage();
              }
            }
            return $this->msg;
        }
        public function getStudentById($id){
          $sql="SELECT * FROM student WHERE student_id=$id";
          $stmt=$this->db->conn()->query($sql);
          return $stmt;
        }
        public function updateStudent($data,$id){
          try{
            $sql="UPDATE student SET name=:sname,semester=:sem,mobile=:mob,bloodgroup=:bg,email=:email WHERE student_id=:id";
            $stmt=$this->db->conn()->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':sname',$data['sname']);
            $stmt->bindParam(':sem',$data['semid']);
            $stmt->bindParam(':mob',$data['mobile']);
            $stmt->bindParam(':bg',$data['bloodgroup']);
            $stmt->bindParam(':email',$data['email']);
            $exec=$stmt->execute();
            if($exec){
              $this->msg="Student Data Updated Success";
              header('Location: view_students.php');
            }else{
              $this->msg="Something Went Wrong";
            }
          }catch(PDOException $e){
            echo $e->getMessage();
          }
          return $this->msg;
        }
    }
?>
