<?php
    session_start();
    if(isset($_SESSION['name']) && $_SESSION['pass']){
        define('SECURITYAD', true);
        include_once('../config/connecttion.php');
        $user_id = $_GET['user_id'];
        $sql = "DELETE FROM user WHERE user_id = '$user_id'";
        $query = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=user');
    }
    else{
        header('location: index.php');
    }
?>