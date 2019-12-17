<?php
require_once(__DIR__.'//./database/DB.php');

$db=new DB();
if($_GET['semester']){
    getStudent($_GET['semester'],$db);
}
function getStudent($sem,$db){
    $sql="SELECT student_id,name FROM student WHERE semester=$sem";
    $stmt=$db->conn()->query($sql);
    $json=json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    echo $json;
}