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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
    <?php include "../inc/header.php"?>
        <div class="row headding-section">
            <div class="col-10"><h2>Student Information</h2></div>
            <div class="col-2"><a href="index.php?action=logout" class="btn btn-primary text-right">Sign Out</a></div>
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
                <a href="studentPayment" class="btn btn-primary">Payment Information</a>
              </div>
            </div>
          </div>
        </div>
      </div>
        <script src="js/script.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    </body>
    </html>

<?php include "../inc/footer.php"?>
