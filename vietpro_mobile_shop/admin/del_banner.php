<?php
    session_start();
    if(isset($_SESSION['name']) && ($_SESSION['pass'])){
        define('SECURITYAD', true);
        include_once('../config/connecttion.php');
        $bann_id = $_GET['bann_id'];
        $sql = "DELETE FROM aside WHERE bann_id = '$bann_id'";
        $query = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=banner');
    }
    else{
        header('location: index.php');
    }
?>