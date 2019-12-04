<?php
    session_start();
    if(isset($_SESSION['name']) && ($_SESSION['pass'])){
        define('SECURITYAD', true);
        include_once('../config/connecttion.php');
        $comm_id = $_GET['comm_id'];
        $sql_del = "DELETE FROM comment WHERE comm_id = '$comm_id'";
        $query_del = mysqli_query($conn, $sql_del);
        header('location: index.php?page_layout=comment');
    }
    else{
        header('location: index.php');
    }
?>