<?php
    session_start();
    if(isset($_SESSION['name']) && ($_SESSION['pass'])){
        define('SECURITYAD', true);
        include_once('../config/connecttion.php');
        $cat_id = $_GET['cat_id'];
        $sql = "DELETE FROM category WHERE cat_id = '$cat_id'";
        $query = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=category');
    }
    else{
        header('location: index.php');
    }
?>