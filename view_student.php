<?php
    include "config.php";
    include "database.php"
?>
<?php
    $db = new Database();
    $query = "select student.id,student.student_id,student.name,student.taken_course,department.dept_name from student inner join department on student.department_id=department.dept_id";
    $read = $db ->select($query);
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "delete from student where id=$id";
        $del = $db->delete($query);
    }
?>
<?php include "inc/header.php"?>
        <div class="row headding-section">
            <div class="col-10"><h2>Student List</h2></div>
            <div class="col-2"><a href="index.php" class="btn btn-primary text-right">Back</a></div>
        </div>
        <div class="row">
            <div class="col">
                 <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>StudentID</th>
                        <th>Department</th>
                        <th>Taken Course</th>
                        <th>option</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php if($read) {?>
                     <?php while($row = $read->fetch_assoc()) {?>
                       <?php print_r($row['id']); ?>
                      <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['student_id']?></td>
                        <td><?php echo $row['dept_name'];?></td>
                        <td><?php echo $?></td>
                        <td>
                            <a href="update.php?id=<?php echo urlencode($row['id']);?>" class="btn btn-info">Update</a>
                            <a  onclick="return confirm('are you sure to delete')" href="?id=<?php echo urlencode($row['id']);?>" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      <?php }?>
                      <?php } else {?>
                      <p>data not found</p>
                      <?php }?>
                    </tbody>
                </table>
            </div>
        </div
<?php include "inc/footer.php"?>
