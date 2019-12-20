<?php
  session_start();
  if($_SESSION['id']==null){
    header('Location:../teacher_login.php');
  }else{
    $user=$_SESSION['id'];
  }
  if(isset($_GET['action']) && $_GET['action']=='logout'){
    session_destroy();
    session_unset();
    header('Location: ../teacher_login.php');
  }  
  require_once(__DIR__."\..\database\Teacher.php");
  $tch=new Teacher();
  $msg='';
  $semesters=$tch->getSemester();
  if(isset($_POST['getStudent'])){
    if($_POST['getStudent']==0){
      $msg= "<p class=\"alert alert-danger\">Please select semester</p>";
    }
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

    <title>Student Information</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Teacher Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
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
    <div class="row">
      <div class="col-md-4">
          <?php echo $msg??""?>
          <form class="form-inline" method="POST" action="">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Select Semester</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="getStudent">
              <option selected value="0">Choose...</option>
              <?php foreach($semesters as $semester):?>
              <option value="<?php echo $semester['semester_id']?>"><?php echo $semester['semester_name']?></option>
              <?php endforeach;?>
            </select>
            <button type="submit" class="btn btn-primary my-1" name="submit">Submit</button>
        </form>
      </div>
    </div>
      <div class="row">
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
                </tr>
              </thead>
              <tbody>
                <?php if(isset($sts)): ?>
                <?php foreach($sts as $st): ?>
                <tr>
                  <td><?php echo $st['student_id'] ?? "" ?></td>
                  <td><?php echo $st['name'] ?? ""?></td>
                  <td><?php echo $st['semester_name'] ?? "" ?></td>
                  <td><?php echo $st['mobile'] ?? "" ?></td>
                  <td><?php echo $st['email'] ?? ""?></td>
                  <td><?php echo $st['bloodgroup'] ?? ""?></td>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
    <script src="../js/script.js"></script>
  </body>
</html>
