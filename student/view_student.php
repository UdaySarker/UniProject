<?php
    include "config.php";
    include "database.php"
?>
<?php
    $db = new Database();
    $query = "SELECT s.student_id,s.name,d.department_name,c.course_name FROM student s, department d,course c WHERE s.dept_id=d.dept_id AND s.taken_course=c.course_id";
    $read = $db ->select($query);
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "delete from student where id=$id";
        $del = $db->delete($query);
    }
?>
<?php include "inc/header.php"?>
        <div class="row headding-section">
            <div class="col-10"><h2>Student Information</h2></div>
            <div class="col-2"><a href="index.php" class="btn btn-primary text-right">Back</a></div>
        </div>
        <div class="row mr-auto">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <a href="student_result.php" class="btn btn-primary">Result Information</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <a href="student_courseInfo" class="btn btn-primary">Course Information</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <a href="studentPayment" class="btn btn-primary">Payent Information</a>
              </div>
            </div>
          </div>
        </div>
<?php include "inc/footer.php"?>
