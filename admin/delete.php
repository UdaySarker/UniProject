<?php
    require_once('../database/Admin.php');
    if(isset($_GET['action'])&& $_GET['action']=='delete'){
        $ad=new Admin();
        $ad->deleteStudent($_GET['id']);
    }
?>