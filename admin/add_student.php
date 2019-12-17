<?php
    require_once('./database/DB.php');
    $db=new DB
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Album example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>

  <body>
    <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>Admin Portal</strong>
          </a>
        </div>
      </div>
    </header>
    <div class="container" style="margin-top:20px">
        <div class="row justify-content-md-center">
            <div class="col-lg-8 col-offset-2">
            <form>
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
                        <select class="form-control form-control-sm" name="semester">
                            <option>Small select</option>
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
                    <div class="col-sm-2">
                        <input type="email" class="form-control form-control-sm" id="email" class="email">
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
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>
