<?php
  session_start();
  if($_SESSION['id']==null){
    header('Location:../student_login.php');
  }else{
    $user=$_SESSION['id'];
  }
  if(isset($_GET['action']) && $_GET['action']=='logout'){
    session_destroy();
    session_unset();
    header('Location: ../student_login.php');
  }
  require_once(__DIR__."\..\database\Student.php");
  require_once(__DIR__."\..\database\Teacher.php");
  $user=$_SESSION['id'];
  $sts=new Student();
  $gpas=$sts->getGpa($user);
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Student Result</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Student Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="#">Result Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_student.php">Course Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view_students.php">Payment Info</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
  <div class="">
    <h2>Result Information</h2>
  </div>
  <div class="">

  </div>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Semester</th>
        <th>GPA</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($gpas as $gpa):?>
    <tr>
      <td><?php echo $gpa['semester_name']?></td>
      <td><?php echo $gpa['student_gpa']?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>
    </div>
  </div>
  </body>
</html>
