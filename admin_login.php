<?php
  include_once(__DIR__.'//./database/Admin.php');
  include_once(__DIR__.'//./inc/header.php');

  if(isset($_POST['adLogin'])){
    $ad=new Admin();
    $res=$ad->checkAdLogin($_POST);
  }
?>
<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="" method="post">
                        <?php if(isset($res)): ?>
                        <h4 class="alert alert-danger"><?php echo $res; ?></h4>
                        <?php endif; ?>
                        <h3 class="text-center text-info">Admin Portal</h3>
                        <input type="hidden" name="type" value="2">
                        <div class="form-group">
                            <label for="username" class="text-info">Admin ID</label><br>
                            <input type="text" name="adUsername" id="sid" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="adPassword" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            <input type="submit" name="adLogin" class="btn btn-info btn-md">
                            <a href="index.php" class="btn btn-info">Return Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "inc/footer.php"?>
