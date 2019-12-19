<?php
     session_start();
     if($_SESSION['id']==null){
         header('Location:../admin_login.php');
       }else{
         $user=$_SESSION['id'];
       }
       if(isset($_GET['action']) && $_GET['action']=='logout'){
         session_destroy();
         session_unset();
         header('Location: ../admin_login.php');
       } 
  require_once(__DIR__."\..\database\Teacher.php");
  $tch=new Teacher();
  $semesters=$tch->getSemester();
  if(isset($_POST['getStudent'])){
     $sts=$tch->getStudent($_POST['getStudent']);
  }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Admin Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="add_student.php">Add Student</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="view_students.php">View Student</a>
        </li>
      </ul>
    </div>
    <div class="mr-sm-2">
      <a href="?action=logout" class="nav-link btn btn-primary">Sign Out</a>
    </div>
  </nav>

  <div class="container">
  <h2 >View Students</h2>
    <div class="row">
    
    <br/>
    <form class="form-inline" method="POST" action="">
    <div class="form-group">
      <select class="form-control" name="getStudent" style="margin-bottom:5px">
        <option value="">Please Select Semester</option>
        <?php foreach($semesters as $semester):?>
        <option value="<?php echo $semester['semester_id']?>"><?php echo $semester['semester_name']?></option>
        <?php endforeach?>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" name="" class="btn btn-primary mb-2" style="margin-left: 5px">View</button>
    </div>
  </form>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>Semester</th>
        <th>Mobile Number</th>
        <th>Email</th>
        <th>BloodGroup</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
<?php if(isset($sts)): ?>
<?php foreach($sts as $st): ?>
    <tr>
      <td><?php echo $st['student_id'] ?></td>
      <td><?php echo $st['name'] ?></td>
      <td><?php echo $st['semester_name'] ?></td>
      <td><?php echo $st['mobile'] ?></td>
      <td><?php echo $st['email'] ?></td>
      <td><?php echo $st['bloodgroup'] ?></td>
      <td>
        <a href="update_students.php?id=<?php echo $st['student_id'] ?>" class="btn btn-sm btn-info">Update</a>
        <a href="#" class="btn btn-sm btn-danger">Delete</a>
      </td>
    </tr>
<?php endforeach ?>
<?php endif ?>
    </tbody>
  </table>
</div>
    </div>
  </div>
  </body>
</html>
