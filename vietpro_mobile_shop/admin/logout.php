<?php
    session_start();
    if(isset($_SESSION['name']) & isset($_SESSION['pass'])){
        session_destroy();
        header('location: index.php');
    }
?>