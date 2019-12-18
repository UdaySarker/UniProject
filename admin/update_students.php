<?php
    require_once('../database/Teacher.php');
    require_once('../database/Admin.php');
    $tch=new Teacher();
    $ad=new Admin();
    $sems=$tch->getSemester();
    if(isset($_GET['id'])){
      $id=filter_var($_GET['id'],FILTER_SANITIZE_STRING);
      $sts=$ad->getStudentById($_GET['id']);
    }else{
      header('Location:index.php');
    }
    if(isset($_POST['updateStudent'])){
        $ad=new Admin();
        $id=$_POST['sid'];
        $res=$ad->updateStudent($_POST,$id);
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Update Student</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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
      <li class="nav-item">
        <a class="nav-link" href="view_students.php">View Student</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container" style="margin-top:20px">
        <div class="row justify-content-md-center">
            <div class="col-lg-8 col-offset-2">
              <h2>Update Student Data</h2>
            <?php if(isset($res)):?>
            <h5 class="alert alert-danger w-50"><?=$res ?? ''?></h5>
            <?php endif ?>
            <form method="POST" action="">
              <?php foreach($sts as $st): ?>
                <div class="form-group row">
                    <label for="sid" class="col-sm-2 col-form-label">Student ID</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm" id="sid" name="sid" value="<?php echo $st['student_id'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="studentname" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="studentname" name="sname" value="<?php echo $st['name'] ?>">
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
                        <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" value="<?php echo $st['mobile'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bloodgroup" class="col-sm-2 col-form-label">Blood Group</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-sm" id="bloodgroup" name="bloodgroup" value="<?php echo $st['bloodgroup'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?php echo $st['email'] ?>">
                    </div>
                </div>
                <?php endforeach ?>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="updateStudent">Update Student</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>
