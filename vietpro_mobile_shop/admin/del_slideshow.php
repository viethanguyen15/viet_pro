<?php
    session_start();
    if(isset($_SESSION['name']) && ($_SESSION['pass'])){
        define('SECURITYAD', true);
        include_once('../config/connecttion.php');
        $slider_id = $_GET['slider_id'];
        $sql = "DELETE FROM slider WHERE slider_id = '$slider_id'";
        $query = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=slideshow');
    }
    else{
        header('location: index.php');
    }
?>