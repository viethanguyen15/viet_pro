<?php
    session_start();
    define('SECURITYAD', true);
    include_once('../config/connecttion.php');
    if(isset($_SESSION['name']) && isset($_SESSION['pass'])){
        include_once('admin.php');
    }
    else{
        include_once('login.php');
    }
?>