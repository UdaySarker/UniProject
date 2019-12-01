<?php
    include "inc/index_header.php";
    include "config.php";
    include "database.php";
?>
<?php
    $db = new Database();
    $deptNames=$db->selectDept("select * from department");
    if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $id = mysqli_real_escape_string($db->link, $_POST['id']);
        $dep = mysqli_real_escape_string($db->link, $_POST['department_id']);

        if($name == "" || $id == "" || $dep == "")
        {
            $error = "field must not be empty";
        }
        else
        {
            $query = "insert into student (name,student_id,department_id) values ('$name','$id','$dep')";
            $result = $db->insert($query);
        }
    }
?>
       <?php if(isset($error)){echo $error;}?>
       <div class="row headding-section">
           <div class="col-12"><h2>Add student</h2></div>
       </div>
       <div class="row">
           <div class="col"><a href="view.php" class="btn btn-info">View</a></div>
       </div>
       <div class="row">
           <div class="col-12">
               <form action="index.php" method="post">
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control col-6 sk" name="name">
                  </div>
                  <div class="form-group">
                    <label for="id">Student ID:</label>
                    <input type="text" class="form-control col-6 sk" name="id">
                  </div>
                  <div class="form-group">
                    <label for="department">Department:</label>
                    <select class="form-control col-6 sk" name="department_id">
                      <?php foreach($deptNames as $dept): ?>
                      <option value="<?php echo $dept['dept_id'] ?>"><?php echo $dept['dept_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary" name="submit">ADD</button>
                </form>
           </div>
       </div>
<?php include "inc/footer.php"?>
