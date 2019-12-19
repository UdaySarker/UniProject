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
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
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
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 offset-md-1 py-4">
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>Admin Portal</strong>
          </a>
        </div>
        <div class="mr-sm-2">
      <a href="?action=logout" class="nav-link btn btn-primary">Sign Out</a>
    </div>
      </div>
    </header>

    <main role="main">
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <h5 class="card-title">View Students</h5>
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="view_students.php" class="btn btn-sm btn-outline-primary">View</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <h5 class="card-title">Add Students</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="add_student.php" class="btn btn-sm btn-outline-secondary">Add</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>

    <footer class="text-muted">
    </footer>
  </body>
</html>
