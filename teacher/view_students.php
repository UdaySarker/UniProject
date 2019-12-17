<?php
  require_once(__DIR__."\..\database\Teacher.php");
  $tch=new Teacher();
  $semesters=$tch->getSemester();
  if(isset($_POST['submit'])){
     $sts=$tch->getStudent($_POST);
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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Teacher Portal</a>>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <h2>View Students</h2>
          <form class="" action="" method="post">
            <select class="" name="getStudent" class="form-control col-lg-4" style="margin-bottom:5px">
              <option value="">Please Select Semester</option>
              <?php foreach($semesters as $semester):?>
              <option value="<?php echo $semester['semester_id']?>"><?php echo $semester['semester_name']?></option>
              <?php endforeach?>
            </select>
            <input type="submit" name="submit" value="Go">
          </form>
          <label for="">Search By</label>
          <input type="text" name="" value="" onkeyup="searchBox(this.value)"id="searchBox" placeholder="search" class="form-control col-lg-4">
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
                  <td><?php echo $st['student_id'] ?></td>
                  <td><?php echo $st['name'] ?></td>
                  <td><?php echo $st['semester_name'] ?></td>
                  <td><?php echo $st['mobile'] ?></td>
                  <td><?php echo $st['email'] ?></td>
                  <td><?php echo $st['bloodgroup'] ?></td>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>

    </script>
  </body>
</html>
