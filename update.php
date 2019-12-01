<?php
    include "config.php";
    include "database.php"
?>
<?php
    $id = $_GET['id'];
    $db = new Database();
    $query = "select * from student where id=$id";
    $get_all_data = $db->select($query)->fetch_assoc();

    if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $sid = mysqli_real_escape_string($db->link, $_POST['id']);
        $dep = mysqli_real_escape_string($db->link, $_POST['department']);
        
        if($name == "" || $sid == "" || $dep == "")
        {
            $msg = "Field must not be empty";
        }
        else
        {
            $update_query = "
            update student
            set
            name = '$name',
            student_id = '$sid',
            department = '$dep'
            where id = $id
            ";
            $update = $db->update($update_query);
        }
    }
?>
<?php include "inc/index_header.php"?>
       <div class="row headding-section">
           <div class="col-12"><h2>Update student info</h2></div>
       </div>
       <div class="row">
           <div class="col"><a href="view.php" class="btn btn-info">Back</a></div>
       </div>
       <div class="row">
           <div class="col-12">
               <form action="update.php?id=<?php echo $id;?>" method="post">
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control col-6 sk" name="name" value="<?php echo $get_all_data['name'];?>">
                  </div>
                  <div class="form-group">
                    <label for="id">Student ID:</label>
                    <input type="text" class="form-control col-6 sk" name="id" value="<?php echo $get_all_data['student_id'];?>">
                  </div>
                  <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" class="form-control col-6 sk" name="department" value="<?php echo $get_all_data['department'];?>">
                  </div>
                  <button type="submit" class="btn btn-primary" name="submit">update</button>
                </form>
           </div>
       </div>
<?php include "inc/footer.php"?>