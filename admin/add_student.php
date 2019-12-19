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
    require_once('../database/Teacher.php');
    require_once('../database/Admin.php');
    $tch=new Teacher();
    $sems=$tch->getSemester();
    if(isset($_POST['addStudent'])){
        $ad=new Admin();
        $res=$ad->insertStudent($_POST);
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Add Student</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Admin Portal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="add_student.php">Add Student</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="view_students.php">View Student</a>
            </li>
            </ul>
        </div>
        <div class="mr-sm-2">
            <a href="?action=logout" class="nav-link btn btn-primary">Sign Out</a>
        </div>
    </nav>
    <div class="container" style="margin-top:20px">
        <div class="row justify-content-md-center">
            <div class="col-lg-8 col-offset-2">
            <?php if(isset($res)):?>
            <h5 class="alert alert-danger w-50"><?=$res??''?></h5>
            <?php endif ?>
            <form method="POST" action="">
                <div class="form-group row">
                    <label for="sid" class="col-sm-2 col-form-label">Student ID</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm" id="sid" name="sid">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="studentname" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="studentname" name="sname">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-4">
                        <select class="form-control form-control-sm" name="semid">
                            <option value="">Select Semester</option>
                        <?php if(isset($sems)):?>
                            <?php foreach($sems as $sem):?>
                            <option value="<?php echo $sem['semester_id']?>"><?php echo $sem['semester_name']?></option>
                        <?php endforeach?>
                        <?php endif?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm" id="mobile" name="mobile">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bloodgroup" class="col-sm-2 col-form-label">Blood Group</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm" id="bloodgroup" name="bloodgroup">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control form-control-sm" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="addStudent">Add Student</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>
