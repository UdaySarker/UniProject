<?php
  require_once(__DIR__."\..\database\Teacher.php");
  $tch=new Teacher();
  if(isset($_POST['setAtt'])){
        print_r($_POST);
  }
  $semesters=$tch->getSemester();
  $department=$tch->getDepartment();
  $courses=$tch->getCourse();
  $stAtts;
  if(isset($_POST['getStudentForAtt'])){
    $stAtts=$tch->getStudentForAtt($_POST);
  }
  if(isset($_POST['studentAtt'])){
    print_r($_POST['studentAtt']);
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
    <div class="container-fluid">
      <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Teacher Portal</a>
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
          </li>
        </ul>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <h2>Student Attendance</h2>
          <form class="" action="" method="post" class="form-group" id="myForm">
            <div class="col-md-4">
            <select name="course" id="course">
                  <option value="">Please select course</option>
                  <?php foreach($courses as $course):?>
                    <option value="<?php echo $course['course_id']?>"><?php echo $course['course_name']?></option>
                    <?php endforeach?>
            </select>
            </div>
            <button id="btn" type="submit" name="getStudentForAtt"class="btn btn-sm btn-outline-info" style="margin-left: 10px">Get Info</button>
            <button onclick="window.clear()" class="btn btn-sm btn-outline-info">Clear All</button>
            </form>
          <form method="post" action="">
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Attendance</th>
                </tr>
              </thead>
              <tbody id="tablebody">
                    <?php if(isset($stAtts)):?>
                    <?php foreach($stAtts as $stAtt):?>
                    <tr>
                      <td><input type="hidden" name="studentAtt[sid]" value="<?php echo $stAtt['student_id']?>"><?php echo $stAtt['student_id']?></td>
                      <td><input type="hidden" name="studentAtt[sname]" value="<?php echo $stAtt['name']?>"><?php echo $stAtt['name']?></td>
                      <td><input type="checkbox" name="studentAtt[sta]"></td>
                    </tr>
                    <?php endforeach?>
                    <?php endif?>
              </tbody>
            </table>
            <div>
                <select name="semester" class="form-control col-lg-4 w-50" style="margin-bottom:5px">
                  <option value="">Please Select Semester</option>
                    <?php foreach($semesters as $semester):?>
                  <option value="<?php echo $semester['semester_id']?>"><?php echo $semester['semester_name']?></option>
                <?php endforeach?>    
                </select>
                  <label for="">&nbsp;||Pick Class Date</label>
                  <input type="date" name="attDate">
            </div>
            <input type="submit" name="submitAtt" value="Submit">
          </form>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/script.js"></script>
  </body>
</html>
