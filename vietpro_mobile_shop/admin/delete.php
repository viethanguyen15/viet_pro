<?php
    session_start();
    if(isset($_SESSION['name']) && ($_SESSION['pass'])){
        define('SECURITYAD', true);
        include_once('../config/connecttion.php');
        $prd_id = $_GET['prd_id'];
        $sql = "DELETE FROM product WHERE prd_id = $prd_id";
        $query = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=product');
    }
    else{
        header('location: index.php');
    }
?>